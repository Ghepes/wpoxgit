=== WP Oxgit ===
Tags: git, deploy, deployment, github, workflow
Requires at least: 5.3
Tested up to: 5.6
Stable tag: 3.1.10
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Deploy directly from GitHub and never again copy files over FTP. It works everywhere - even on cheap shared hosting!

== Description ==

= Features =

* Install and update your WordPress themes and plugins directly from GitHub
* BitBucket and GitLab support
* Easy version control of your clients code
* Works everywhere because it hooks in to the WordPress core auto updater
* No Git or SSH needed on the server
* **Push-to-deploy** can automatically trigger updates when whenever you push to GitHub
* Support for branches

[Learn more about pricing](https://github.com/Ersin84/wpoxgit/#licenses)

= Get started =

If you already use Git for your projects and your themes and plugins are in their own repositories on GitHub, getting started with WP Oxgit is simple and easy. Just go to "New plugin" or "New theme" in the WP Oxgit menu and type in the repository for the package: github-username/repository-name

If any of your plugins or themes are in private repositories on GitHub, WP Oxgit will need a token to access them. You can read GitHub's guide to application tokens [here](https://help.github.com/articles/creating-an-access-token-for-command-line-use/). Paste in the token at WP Oxgit settings page.

= Conventions =

* Theme stylesheets _must_ be named the same as the repository
* Plugin directories _must_ be named the same as the repository
* GitHub version tags _must_ be numeric, such as '1.0' or '1.0.1', with an optional preceding 'v', such as 'v1.0.1'
* WordPress version tags _must_ be numeric, such as '1.0' or '1.0.1'

= Git workflow =

The way WP Oxgit works, packages (themes and plugins) need to be in their own repositories. If your packages are in their own repositories already, you can safely skip this section. Some developers prefer having their whole WordPress installation under Git, which potentially makes things a bit more complicated. By having all packages in their own repositories, you can easily share code across clients / projects. Since you shouldn’t be editing the core WordPress code, in most cases having the whole project under Git shouldn’t be necessary. However, if for some reason your project require that you have one Git repository for the whole project, you will have to use Git submodules, so that you can still have every package in its own (sub) repository.

== Installation ==

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `wp-oxgit.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `wp-oxgit.zip`
2. Extract the `wpoxgit` directory to your computer
3. Upload the `wpoxgit` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

== Screenshots ==

1. Plugins installed and managed with WP Oxgit
2. The WP Oxgit dashboard
3. Manage themes and plugins from the dashboard

== Changelog ==

* Fixes an issue where the WordPress 5.9 welcome panel styles were bleeding over into WP Oxgit's welcome panel
* Adds cURL stats to the troubleshooting tab

* Adds the "Troubleshooting" tab to help you debug your installation if something's not working properly.

* Version bump for deployment

= 3.0.10 =

* Version bump for deployment

= 3.0.9 =

* Additional logging to assist with remote debugging, specifically around connecting to the license server

= 3.0.8 =

* Continued work on fix for WP 5.6 issue with empty transients (failing theme updates)

= 3.0.7 =

* Fix deprecation warnings related the PHP reflection API in PHP 8
* Improve error messages for GitHub
* Add error message for subdirectories that doesn't exist

= 3.0.6 =

* Fix WP 5.6 issue with empty transients (failing plugin updates)

= 3.0.5 =

* Roll back to old plugins/themes views. We're so sorry about this! We thought we could make a few incremental improvements to the user experience, but ultimately ended up breaking critical features for folks. Not our typical style, which is why we're now rolling back to the old plugins/themes list instead of plugging holes. We promise to give this some love an attention soon - doing our best not to break anything! Again, sorry about this!

= 3.0.4 =

* Fix PHP warning introduced in 3.0.3. Sorry about that one!

= 3.0.3 =

* Consolidates the plugins and themes overview into one repositories screen.

= 3.0.2 =

* GitHub is deprecating URL based token auth. Please update to this version of WP Oxgit before May 2020, to keep using GitHub.

= 3.0.1 =

* [Bugfix] Get rid of notices in Plugin.php and Theme.php

= 3.0.0 =

NB: If you are on an older version of WordPress, this version of WP Oxgit can result in PHP warnings.

* [Bugfix] Make theme and plugin upgrader skins compatible with WP 5.3. This is due to a breaking change in WP core. If you have questions, feel free to contact support.

= 2.4.12 =

* [Bugfix] Make sure WP Oxgit only shows up in the menu for admins

= 2.4.11 =

* [Bugfix] Support special characters in GitHub branch names

= 2.4.10 =

* Make sure everything is casted to a string before it's handed off to the DB layer (fixes WP 5.1 DB issues)

= 2.4.9 =

* Addition to previous fix, where repository handle is empty in DB

= 2.4.8 =

* Fix bug where repository handle is empty in DB

= 2.4.7 =

* Use GitLab API v4

= 2.4.6 =

* Fix "PHP Notice: Undefined index" when looking for updates

= 2.4.5 =

* New plugin and themes overview in WP Oxgit - uses tables instead of the squares

= 2.4.4 =

* Add links to help center
* Fix typo in menu
* Fix WP Oxgit icon styling in WordPress 4.9.1
* Fix broken links to WP Oxgit website

= 2.4.3 =

* Always add trailing slashes to Push-to-Deploy URLs, to prevent redirects (that GitHub and Bitbucket won't follow). This should not be a breaking change, since 1. root level URLs (wpoxgit.com) are the same with or without trailing slashes (.com vs .com/) and 2. WordPress always add a trailing slash to a site in a subdirectory (wpoxgit.com/blog/).

= 2.4.2 =

* Feature: Select themes directly from GitHub
* Better onboarding flow with links to new documentation

= 2.4.1 =

* Fix bug where default GitLab branch is installed even if another branch is specified in WP Oxgit

= 2.4.0 =

* Improved navigation
* Connected WP Oxgit to new plugin update system to provide more stable releases

= 2.3.1 =

* Small fixes to links in plugin
* Fix bug: Can't select Push-to-Deploy URL

= 2.3.0 =

* Connect WP Oxgit to the new WP Oxgit Dashboard API (to be announced soon)

= 2.2.0 =

New features:

* Add hook to modify plugin zipball url, so plugins can basically be installed from everywhere
* `wpoxgit_register_dependency` action to inject dependencies into the WP Oxgit container
* Better installation screens
* Pick repository directly from GitHub feature

Bugfixes:

* New webhooks fixes subdirectory issues

= 2.2.1 =

New features:

* Don't show WP Oxgit license key in the dashboard

= 2.1.1 =

Bugfixes:

* Bitbucket tokens were expiring and as a fix, tokens are now being refreshed through our OAuth service on every request to GitHub. Sorry for the troubles!

= 2.1.0 =

New features:

* 1-click authentication with GitHub and Bitbucket
* Automatic set up of Push-to-Deploy on GitHub and Bitbucket - just tick the box
* Use Bitbucket OAuth token instead of username/password - much more safe and easy
* Do action for failed updates - useful for notifications
* Link to new license manager dashboard

Bug fixes:

* Fix broken links to new landing page
* Show error when license has reached its activation limit
* Notify user when license has expired

= 2.0.4 =

Bugfixes:

* Fix GitHub API zipball path for private repositories

= 2.0.3 =

* License install count not shown correct

= 2.0.2 =

Breaking changes:

* New update mechanism, since wp-updates.com has abandoned ship without notice! :sad_panda:

= 2.0.1 =

Bugfixes:

* Active installs for licenses was being displayed incorrect under some circumstances

= 2.0.0 =

Breaking changes:

* Push-to-Deploy: The webhook url now works on a plugin/theme basis, meaning that each plugin and theme has its own unique URL. Please update your webhooks on GitHub and Bitbucket.
* The Oxgitfile has been removed from WP Oxgit. It's main purpose was to support Composer, and I'm working on an extension instead to provide this functionality.

Bugfixes:

* Licenses are revoked on uninstall
* Error messages have been improved

New Features:

* The UI has been improved
* Behind the scene, most code have been refactored to show better error messages etc.

New extensions:

* WP Oxgit Slack Notifications: https://github.com/wpoxgit/wpoxgit-slack

= 1.1.8 =

Bugfixes:

* Update plugin to handle changes in Bitbucket webhooks

= 1.1.7 =

* Issues with database table prefixes in network installations

= 1.1.6 =

Bugfixes:

* Exclude WP Oxgit plugins and themes from w.org update checks

New stuff:

* Install plugins and themes from subdirectories (like wp-content/themes/Awesome-Theme)
* Friendly welcome hero unit after install

= 1.1.5 =

Bugfixes:

* 2 options not being deleted on uninstall
* Bug using multiple networks plugin
* Small fix to licenses

= 1.1.4 =

Bugfixes:

* Failing SQL query on Multisite installations in plugin overview
* Add index.php files to all directories and make sure no template files are directly accessible

New stuff:

* Add link to documentation in footer (documentation updates coming soon)

= 1.1.3 =

Bugfixes:

* Make sure we don't get stuck in maintenance mode if installation fails
* Plugins were accidentally reactivated for the network, even if they were only activated for one site

= 1.1.2 =

Bugfixes:

* Push-to-Deploy not showing on edit package pages

= 1.1.1 =

Bugfixes:

* Settings API bug: Updating license key could result in reset Push-to-Deploy token (if you experience this, you need to copy the new web hook URL from the dashboard to GitHub / Bitbucket / GitLab. Sorry!!)

New stuff:

* New UI on plugins and themes overview
* Unlink packages from WP Oxgit (connect them again with "dry run")
* WP 4.2 style spinning wheels on update buttons
* Dedicated pages to edit packages

= 1.1.0 =

* New licensing model
* Free version now supports Push-to-Deploy and branches
* Private repositories will from now on require a license

= 1.0.9 =

* Logger: Enable / disable logging for debug purposes
* Use HTTPS for WP Oxgit logo

= 1.0.8 =

* Push-to-Deploy for GitLab repositories
* Remove 'manage' links on multisite
* DB cleanup of delete plugins

= 1.0.7 =

* Bug when installing and updating themes

= 1.0.6 =

* Support for including a wpoxgit.php file to run commands on installation and updating: https://gist.github.com/petersuhm/9b7f4e4886519fc3a8a8
* Actions after packages are installed or updated
* Support for GitLab

= 1.0.5 =

* Add dry run feature in order to set up already installed plugins

= 1.0.4 =

* Auto updates

= 1.0.3 =

* Bugfix: Make sure plugin is reactivated after update
* Activation links on multisite
* Support for dots in repository names

= 1.0.2 =

* Added support for multisite setups

= 1.0.1 =
* Add support for branches in Pro version

= 1.0.0 =
* No more beta
* Release of WP Oxgit Pro

= 0.1.2 =
* Minor bugfixes

= 0.1.1 =
* Bitbucket support for public and private repositories
* Activate repositories directly after installation
* Better house keeping after plugin deletion

= 0.1.0 =
* Public BETA release
