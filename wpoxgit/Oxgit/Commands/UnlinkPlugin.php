<?php

namespace Oxgit\Commands;

class UnlinkPlugin
{
    public $file;

    public function __construct($input)
    {
        $this->file = $input['file'];
    }
}
