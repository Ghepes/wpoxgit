<?php

namespace Oxgit\Handlers;

use Oxgit\Actions\PluginWasEdited;
use Oxgit\Commands\EditPlugin as EditPluginCommand;
use Oxgit\Git\Repository;
use Oxgit\Storage\PluginRepository;

class EditPlugin
{
    /**
     * @var PluginRepository
     */
    private $plugins;

    /**
     * @param PluginRepository $plugins
     * @internal param Dashboard $dashboard
     */
    public function __construct(PluginRepository $plugins)
    {
        $this->plugins = $plugins;
    }

    public function handle(EditPluginCommand $command)
    {
        $repository = new Repository($command->repository);
        $repository->setBranch($command->branch);

        $this->plugins->editPlugin($command->file, array(
            'repository' => $repository,
            'branch' => $repository->getBranch(),
            'status' => $command->status,
            'ptd' => $command->pushToDeploy,
            'subdirectory' => $command->subdirectory,
        ));

        do_action('wpoxgit_plugin_was_edited', new PluginWasEdited(
            $this->plugins->oxgitPluginFromFile($command->file)
        ));
    }
}
