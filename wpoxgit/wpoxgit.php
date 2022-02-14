<?php

/**
 * Plugin Name: WP Oxgit
 * Plugin URI: https://github.com/Ersin84/wpoxgit
 * Description: Pain-free deployment of WordPress themes and plugins directly from GitHub.
 * Version: 3.0.13
 * Author: WP Oxgit
 * Author URI: https://github.com/Ersin84/wpoxgit
 * License: GNU GENERAL PUBLIC LICENSE
 */

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

require __DIR__ . '/autoload.php';

use Oxgit\ActionHandlers\ActionHandlerProvider;
use Oxgit\Oxgit;
use Oxgit\OxgitServiceProvider;

$oxgit = new Oxgit;
$oxgit->setInstance($oxgit);
$oxgit->oxgitPath = plugin_dir_path(__FILE__);
$oxgit->oxgitUrl = plugin_dir_url(__FILE__);
$oxgit->register(new OxgitServiceProvider);
$oxgit->register(new ActionHandlerProvider);

do_action('wpoxgit_register_dependency', $oxgit);

register_activation_hook(__FILE__, array($oxgit, 'activate'));

require_once('wp-updates-plugin.php');
new WPUpdatesPluginUpdater_957('https://dashboard.wpoxgit.com/api/releases/latest', plugin_basename(__FILE__));

$oxgit->init();

if ( ! function_exists('getHostIcon')) {
    function getHostIcon($host)
    {
        if ($host === 'gh') {
            return 'fa-github';
        } elseif ($host === 'bb') {
            return 'fa-bitbucket';
        } else {
            return 'fa-gitlab';
        }
    }
}

if ( ! function_exists('getHostBaseUrl')) {
    function getHostBaseUrl($host)
    {
        if ($host === 'gh') {
            return 'https://github.com/';
        } elseif ($host === 'bb') {
            return 'https://bitbucket.org/';
        } elseif ($host === 'gl') {
            return trailingslashit(get_option('gl_base_url'));
        } else {
            return null;
        }
    }
}

$hidePluginsFromUpdateChecks = function($args, $url) use ($oxgit)
{
    if (0 !== strpos($url, 'https://api.wordpress.org/plugins/update-check')) {
        return $args;
    }

    $plugins = json_decode($args['body']['plugins'], true);

    $repository = $oxgit->make('Oxgit\Storage\PluginRepository');
    $pluginsToHide = array_keys($repository->allOxgitPlugins());
    $pluginsToHide[] = plugin_basename(__FILE__);

    foreach ($pluginsToHide as $plugin) {
        unset($plugins['plugins'][$plugin]);
        unset($plugins['active'][array_search($plugin, $plugins['active'])]);
    }

    $args['body']['plugins'] = json_encode($plugins);

    return $args;
};

$hideThemesFromUpdateChecks = function($args, $url) use ($oxgit)
{
    if (0 !== strpos($url, 'https://api.wordpress.org/themes/update-check')) {
        return $args;
    }

    $themes = json_decode($args['body']['themes'], true);

    $repository = $oxgit->make('Oxgit\Storage\ThemeRepository');
    $themesToHide = array_keys($repository->allOxgitThemes());

    foreach ($themesToHide as $theme) {
        unset($themes['themes'][$theme]);

        if (isset($themes['active']) and in_array($themes['active'], $themesToHide)) {
            unset($themes['active']);
        }
    }

    $args['body']['themes'] = json_encode($themes);

    return $args;
};

add_filter('http_request_args', $hidePluginsFromUpdateChecks, 5, 2);
add_filter('http_request_args', $hideThemesFromUpdateChecks, 5, 2);

// Add link to help page
add_action('admin_menu', function () {
    global $submenu;

    if (current_user_can('manage_options')) {
        $submenu['wpoxgit'][] = array('Get Help', 'manage_options', 'https://wpoxgit.com/support');
    }
});

// Dismiss welcome hero
if (isset($_GET['wpoxgit-welcome']) and $_GET['wpoxgit-welcome'] == '0') {
    update_option('hide-wpoxgit-welcome', true);
}

if ( ! function_exists('oxgitTableName()')) {
    function oxgitTableName()
    {
        global $wpdb;
        $dbPrefix = is_multisite() ? $wpdb->base_prefix : $wpdb->prefix;

        return $dbPrefix . 'wpoxgit_packages';
    }
}

if ( ! function_exists('oxgit')) {
    /**
     * @return \Oxgit\Oxgit
     */
    function oxgit() {
        return \Oxgit\Oxgit::getInstance();
    }
}
