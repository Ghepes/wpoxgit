<?php

namespace Oxgit\Actions;

use Oxgit\Plugin;

class PluginWasUpdated
{
    /**
     * @var Plugin
     */
    public $plugin;

    /**
     * @param Plugin $plugin
     */
    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }
}
