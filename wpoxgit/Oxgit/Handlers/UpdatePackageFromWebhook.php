<?php

namespace Oxgit\Handlers;

use Oxgit\Commands\UpdatePlugin;
use Oxgit\Commands\UpdateTheme;
use Oxgit\Commands\UpdatePackageFromWebhook as UpdatePackageFromWebhookCommand;
use Oxgit\Dashboard;
use Oxgit\Log\Logger;
use Oxgit\Storage\PluginNotFound;
use Oxgit\Storage\PluginRepository;
use Oxgit\Storage\PushToDeployFailed;
use Oxgit\Storage\ThemeNotFound;
use Oxgit\Storage\ThemeRepository;

class UpdatePackageFromWebhook
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @var Logger
     */
    private $log;

    /**
     * @var PluginRepository
     */
    private $plugins;

    /**
     * @var ThemeRepository
     */
    private $themes;

    /**
     * @param Dashboard $dashboard
     * @param Logger $log
     * @param PluginRepository $plugins
     * @param ThemeRepository $themes
     */
    public function __construct(Dashboard $dashboard, Logger $log, PluginRepository $plugins, ThemeRepository $themes)
    {
        $this->dashboard = $dashboard;
        $this->log = $log;
        $this->plugins = $plugins;
        $this->themes = $themes;
    }

    public function handle(UpdatePackageFromWebhookCommand $command)
    {
        $package = false;

        // Plugin?
        try {
            $package = $this->plugins->oxgitPluginFromFile($command->package);
            $updateCommand = new UpdatePlugin(array(
                'file' => $package->file,
                'repository' => $package->repository,
            ));
        } catch (PluginNotFound $e) {
            // No plugins...
        }

        // Or theme?
        try {
            $package = $this->themes->oxgitThemeFromStylesheet($command->package);
            $updateCommand = new UpdateTheme(array(
                'stylesheet' => $package->stylesheet,
                'repository' => $package->repository,
            ));
        } catch (ThemeNotFound $e) {
            // ... and no themes.
        }

        if ( ! $package) {
            throw new PushToDeployFailed("Push-to-Deploy failed. Couldn't find matching package.");
        }

        // Check if push to deploy is enabled before executing
        if ( ! $package->pushToDeploy) {
            throw new PushToDeployFailed("Push-to-Deploy failed. Push-to-Deploy was not enabled for package '{$package->name}'");
        }

        $this->dashboard->execute($updateCommand);
    }
}
