<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\ThemeWasInstalled;
use Oxgit\Commands\InstallTheme as InstallThemeCommand;
use Oxgit\Dashboard;
use Oxgit\Git\RepositoryFactory;
use Oxgit\Log\Logger;
use Oxgit\Oxgit;
use Oxgit\Storage\ThemeRepository;
use Oxgit\Theme;
use Oxgit\WordPress\ThemeUpgrader;

class InstallTheme
{
    /**
     * @var Oxgit
     */
    private $oxgit;

    /**
     * @var RepositoryFactory
     */
    private $repositoryFactory;

    /**
     * @var ThemeRepository
     */
    private $themes;

    /**
     * @var ThemeUpgrader
     */
    private $upgrader;

    /**
     * @param Oxgit $oxgit
     * @param RepositoryFactory $repositoryFactory
     * @param ThemeRepository $themes
     * @param ThemeUpgrader $upgrader
     */
    public function __construct(Oxgit $oxgit, RepositoryFactory $repositoryFactory, ThemeRepository $themes, ThemeUpgrader $upgrader)
    {
        $this->oxgit = $oxgit;
        $this->repositoryFactory = $repositoryFactory;
        $this->themes = $themes;
        $this->upgrader = $upgrader;
    }

    public function handle(InstallThemeCommand $command)
    {
        $theme = new Theme;

        $repository = $this->repositoryFactory->build(
            $command->type,
            $command->repository
        );

        if ($command->private and $this->oxgit->hasValidLicenseKey()) {
            $repository->makePrivate();
        }

        $repository->setBranch($command->branch);

        $theme->setRepository($repository);
        $theme->setSubdirectory($command->subdirectory);

        $command->dryRun ?: $this->upgrader->installTheme($theme);

        if ($command->subdirectory) {
            $slug = end(explode('/', $command->subdirectory));
        } else {
            $slug = $repository->getSlug();
        }

        $theme = $this->themes->fromSlug($slug);
        $theme->setRepository($repository);
        $theme->setPushToDeploy($command->ptd);
        $theme->setSubdirectory($command->subdirectory);

        $this->themes->store($theme);

        do_action('wpoxgit_theme_was_installed', new ThemeWasInstalled($theme));
    }
}
