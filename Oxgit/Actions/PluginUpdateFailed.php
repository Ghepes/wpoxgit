<?php

namespace Oxgit\Actions;

class PluginUpdateFailed
{
    public $message;

    public function __construct($message) {
        $this->message = $message;
    }
}
