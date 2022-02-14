<?php

namespace Oxgit\Commands;

class UnlinkTheme
{
    public $stylesheet;

    public function __construct($input)
    {
        $this->stylesheet = $input['stylesheet'];
    }
}
