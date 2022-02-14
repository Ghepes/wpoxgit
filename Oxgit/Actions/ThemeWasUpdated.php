<?php

namespace Oxgit\Actions;

use Oxgit\Theme;

class ThemeWasUpdated
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
