<?php

namespace Oxgit\Actions;

use Oxgit\Theme;

class ThemeWasInstalled
{
    /**
     * @var Theme
     */
    public $theme;

    /**
     * @param Theme $theme
     */
    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
