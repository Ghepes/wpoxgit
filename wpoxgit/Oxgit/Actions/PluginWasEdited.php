<?php

namespace Oxgit\Actions;

use Oxgit\Plugin;

class PluginWasEdited
{
    /**
     * @var Plugin
     */
    public $plugin;

    public function __construct(Plugin $plugin) {
        $this->plugin = $plugin;
    }
}
