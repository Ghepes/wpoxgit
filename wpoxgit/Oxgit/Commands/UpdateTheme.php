<?php

namespace Oxgit\Commands;

class UpdateTheme
{
    public $stylesheet;
    public $repository;

    public function __construct($input)
    {
        $this->stylesheet = $input['stylesheet'];
        $this->repository = $input['repository'];
    }
}
