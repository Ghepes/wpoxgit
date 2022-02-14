<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\PluginWasUnlinked;
use Oxgit\Commands\UnlinkPlugin as UnlinkPluginCommand;
use Oxgit\Storage\PluginRepository;

class UnlinkPlugin
{
    /**
     * @var PluginRepository
     */
    private $plugins;

    /**
     * @param PluginRepository $plugins
     */
    public function __construct(PluginRepository $plugins)
    {
        $this->plugins = $plugins;
    }

    public function handle(UnlinkPluginCommand $command)
    {
        $this->plugins->unlink($command->file);

        do_action('wpoxgit_plugin_was_unlinked', new PluginWasUnlinked);
    }
}
