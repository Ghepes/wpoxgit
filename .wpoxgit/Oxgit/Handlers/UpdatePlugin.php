<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\PluginWasUpdated;
use Oxgit\Commands\UpdatePlugin as UpdatePluginCommand;
use Oxgit\Storage\PluginRepository;
use Oxgit\WordPress\PluginUpgrader;

class UpdatePlugin
{
    /**
     * @var PluginRepository
     */
    private $plugins;

    /**
     * @var PluginUpgrader
     */
    private $upgrader;

    /**
     * @param PluginRepository $plugins
     * @param PluginUpgrader $upgrader
     */
    public function __construct(PluginRepository $plugins, PluginUpgrader $upgrader)
    {
        $this->plugins = $plugins;
        $this->upgrader = $upgrader;
    }

    public function handle(UpdatePluginCommand $command)
    {
        $plugin = $this->plugins->oxgitPluginFromFile($command->file);

        $this->upgrader->upgradePlugin($plugin);

        do_action('wpoxgit_plugin_was_updated', new PluginWasUpdated($plugin));
    }
}
