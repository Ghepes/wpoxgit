<?php

namespace Oxgit\Commands;

class UpdatePackageFromWebhook
{
    public $package;

    public function __construct($package)
    {
        $this->package = $package;
    }
}
