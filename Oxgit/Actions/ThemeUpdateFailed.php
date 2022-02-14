<?php

namespace Oxgit\Actions;

class ThemeUpdateFailed
{
    public $message;

    public function __construct($message) {
        $this->message = $message;
    }
}
