<?php

namespace Oxgit\ActionHandlers;

use Oxgit\ProviderInterface;
use Oxgit\Oxgit;

class ActionHandlerProvider implements ProviderInterface
{
    public function register(Oxgit $oxgit)
    {
        // Plugin was installed
        $oxgit->addAction('wpoxgit_plugin_was_installed', 'Oxgit\ActionHandlers\LogWhenPluginWasInstalled');
        $oxgit->addAction('wpoxgit_plugin_was_installed', 'Oxgit\ActionHandlers\ShowMessageWhenPluginWasInstalled');
        $oxgit->addAction('wpoxgit_plugin_was_installed', 'Oxgit\ActionHandlers\SetUpWebhookForPlugin');

        // Plugin was edited
        $oxgit->addAction('wpoxgit_plugin_was_edited', 'Oxgit\ActionHandlers\ShowMessageWhenPluginWasEdited');
        $oxgit->addAction('wpoxgit_plugin_was_edited', 'Oxgit\ActionHandlers\SetUpWebhookForPlugin');

        // Plugin was updated
        $oxgit->addAction('wpoxgit_plugin_was_updated', 'Oxgit\ActionHandlers\LogWhenPluginWasUpdated');
        $oxgit->addAction('wpoxgit_plugin_was_updated', 'Oxgit\ActionHandlers\ShowMessageWhenPluginWasUpdated');

        // Plugin was unlinked
        $oxgit->addAction('wpoxgit_plugin_was_unlinked', 'Oxgit\ActionHandlers\ShowMessageWhenPluginWasUnlinked');

        // Theme was installed
        $oxgit->addAction('wpoxgit_theme_was_installed', 'Oxgit\ActionHandlers\LogWhenThemeWasInstalled');
        $oxgit->addAction('wpoxgit_theme_was_installed', 'Oxgit\ActionHandlers\ShowMessageWhenThemeWasInstalled');
        $oxgit->addAction('wpoxgit_theme_was_installed', 'Oxgit\ActionHandlers\SetUpWebhookForTheme');

        // Theme was edited
        $oxgit->addAction('wpoxgit_theme_was_edited', 'Oxgit\ActionHandlers\ShowMessageWhenThemeWasEdited');
        $oxgit->addAction('wpoxgit_theme_was_edited', 'Oxgit\ActionHandlers\SetUpWebhookForTheme');

        // Theme was update
        $oxgit->addAction('wpoxgit_theme_was_updated', 'Oxgit\ActionHandlers\LogWhenThemeWasUpdated');
        $oxgit->addAction('wpoxgit_theme_was_updated', 'Oxgit\ActionHandlers\ShowMessageWhenThemeWasUpdated');

        // Theme was unlinked
        $oxgit->addAction('wpoxgit_theme_was_unlinked', 'Oxgit\ActionHandlers\ShowMessageWhenThemeWasUnlinked');
    }
}
