<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\ThemeWasUpdated;
use Oxgit\Commands\UpdateTheme as UpdateThemeCommand;
use Oxgit\Storage\ThemeRepository;
use Oxgit\WordPress\ThemeUpgrader;

class UpdateTheme
{
    /**
     * @var ThemeRepository
     */
    private $themes;

    /**
     * @var ThemeUpgrader
     */
    private $upgrader;

    /**
     * @param ThemeRepository $themes
     * @param ThemeUpgrader $upgrader
     */
    public function __construct(ThemeRepository $themes, ThemeUpgrader $upgrader)
    {
        $this->themes = $themes;
        $this->upgrader = $upgrader;
    }

    public function handle(UpdateThemeCommand $command)
    {
        $theme = $this->themes->oxgitThemeFromStylesheet($command->stylesheet);

        $this->upgrader->upgradeTheme($theme);

        do_action('wpoxgit_theme_was_updated', new ThemeWasUpdated($theme));
    }
}
