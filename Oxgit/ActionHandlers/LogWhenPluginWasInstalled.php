<?php

namespace Oxgit\ActionHandlers;

use Oxgit\Actions\PluginWasInstalled;
use Oxgit\Log\Logger;

class LogWhenPluginWasInstalled
{
    /**
     * @var Logger
     */
    private $log;

    /**
     * @param Logger $log
     */
    public function __construct(Logger $log)
    {
        $this->log = $log;
    }

    /**
     * @param PluginWasInstalled $action
     */
    public function handle(PluginWasInstalled $action)
    {
        $this->log->info(
            "Plugin '{name}' was successfully installed. File: '{file}'",
            array('name' => $action->plugin->name, 'file' => $action->plugin->file)
        );
    }
}
