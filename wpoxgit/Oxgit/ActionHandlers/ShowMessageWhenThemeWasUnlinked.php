<?php

namespace Oxgit\ActionHandlers;

use Oxgit\Actions\ThemeWasUnlinked;
use Oxgit\Dashboard;

class ShowMessageWhenThemeWasUnlinked
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function handle(ThemeWasUnlinked $action)
    {
        $this->dashboard->addMessage("Theme was unlinked from WP Oxgit. You can re-connect it with 'Dry run'.");
    }
}
