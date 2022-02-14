<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\ThemeWasUnlinked;
use Oxgit\Commands\UnlinkTheme as UnlinkThemeCommand;
use Oxgit\Storage\ThemeRepository;

class UnlinkTheme
{
    /**
     * @var ThemeRepository
     */
    private $themes;

    /**
     * @param ThemeRepository $themes
     */
    public function __construct(ThemeRepository $themes)
    {
        $this->themes = $themes;
    }

    public function handle(UnlinkThemeCommand $command)
    {
        $this->themes->unlink($command->stylesheet);

        do_action('wpoxgit_theme_was_unlinked', new ThemeWasUnlinked);
    }
}
