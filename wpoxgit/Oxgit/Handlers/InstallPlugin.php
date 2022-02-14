<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\PluginWasInstalled;
use Oxgit\Commands\InstallPlugin as InstallPluginCommand;
use Oxgit\Dashboard;
use Oxgit\Git\RepositoryFactory;
use Oxgit\Log\Logger;
use Oxgit\Plugin;
use Oxgit\Oxgit;
use Oxgit\Storage\PluginRepository;
use Oxgit\WordPress\PluginUpgrader;

class InstallPlugin
{
    /**
     * @var Oxgit
     */
    private $oxgit;

    /**
     * @var PluginRepository
     */
    private $plugins;

    /**
     * @var PluginUpgrader
     */
    private $upgrader;

    /**
     * @var RepositoryFactory
     */
    private $repositoryFactory;

    /**
     * @param Oxgit $oxgit
     * @param PluginRepository $plugins
     * @param PluginUpgrader $upgrader
     * @param RepositoryFactory $repositoryFactory
     */
    public function __construct(Oxgit $oxgit, PluginRepository $plugins, PluginUpgrader $upgrader, RepositoryFactory $repositoryFactory)
    {
        $this->oxgit = $oxgit;
        $this->plugins = $plugins;
        $this->upgrader = $upgrader;
        $this->repositoryFactory = $repositoryFactory;
    }

    public function handle(InstallPluginCommand $command)
    {
        $plugin = $this->oxgit->make('Oxgit\Plugin');

        $repository = $this->repositoryFactory->build(
            $command->type,
            $command->repository
        );

        if ($command->private and $this->oxgit->hasValidLicenseKey()) {
            $repository->makePrivate();
        }

        $repository->setBranch($command->branch);
        $plugin->setRepository($repository);
        $plugin->setSubdirectory($command->subdirectory);

        $command->dryRun ?: $this->upgrader->installPlugin($plugin);

        // Refresh plugin
        $plugin = $this->plugins->fromSlug($plugin->getSlug());

        $plugin->setRepository($repository);
        $plugin->setPushToDeploy($command->ptd);
        $plugin->setSubdirectory($command->subdirectory);

        $this->plugins->store($plugin);

        do_action('wpoxgit_plugin_was_installed', new PluginWasInstalled($plugin));
    }
}
