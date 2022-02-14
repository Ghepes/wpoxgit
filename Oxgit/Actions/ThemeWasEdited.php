<?php

namespace Oxgit\Actions;

use Oxgit\Theme;

class ThemeWasEdited
{
    /**
     * @var Theme
     */
    public $theme;

    public function __construct(Theme $theme) {
        $this->theme = $theme;
    }
}
