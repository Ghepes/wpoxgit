<?php

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

?><h2>
    <img src="https://wpoxgit.com/moerkeblaa_002.png" width="250">
</h2>

<?php if ( ! get_option('hide-wpoxgit-welcome', false)) { ?>
<div id="wpoxgit-welcome-panel" class="wpoxgit-welcome-panel welcome-panel">
    <a class="wpoxgit-welcome-panel-close welcome-panel-close" href="?page=wpoxgit&wpoxgit-welcome=0">Dismiss</a>
    <div class="wpoxgit-welcome-panel-content">
        <h3>Thanks for installing WP Oxgit!</h3>
        <p class="about-description">Here's how to get started:</p>
        <div class="wpoxgit-welcome-panel-column-container">
            <div class="wpoxgit-welcome-panel-column">
                <h4>Using Private Repositories</h4>
                <a class="button button-primary button-hero" href="https://wpoxgit.com/?utm_source=plugin&utm_medium=hero#pricing"><i class="fa fa-credit-card-alt"></i>&nbsp; <strong>Buy a license</strong></a>
                <p>or, type in your license key in the form below</p>
            </div>
            <div class="wpoxgit-welcome-panel-column">
                <h4>Next Steps</h4>
                <ul>
                    <li class="welcome-icon welcome-add-page">Add your <a href="?page=wpoxgit&tab=github">GitHub</a>, <a href="?page=wpoxgit&tab=bitbucket">Bitbucket</a> or <a href="?page=wpoxgit&tab=gitlab">GitLab</a> credentials</li>
                    <li><a href="?page=wpoxgit-plugins-create" class="welcome-icon welcome-add-page">Install a plugin</a></li>
                    <li><a href="?page=wpoxgit-themes-create" class="welcome-icon welcome-add-page">Install a theme</a></li>
                </ul>
            </div>
            <div class="wpoxgit-welcome-panel-column wpoxgit-welcome-panel-last">
                <h4>More Actions</h4>
                <ul>
                    <li><a href="http://docs.wpoxgit.com/" target="_blank" class="welcome-icon welcome-learn-more">Take a look at the docs</a></li>
                    <li><a href="https://git4wp.com/" target="_blank" class="welcome-icon welcome-learn-more">[Video] Git for WordPress developers</a></li>
                    <li><a href="http://docs.wpoxgit.com/article/24-automatic-updates-with-push-to-deploy" target="_blank" class="welcome-icon welcome-learn-more">Learn about Push-to-Deploy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<h2 class="nav-tab-wrapper">
    <a href="?page=wpoxgit" title="License" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><i class="fa fa-credit-card"></i>&nbsp; License</a>
    <a href="?page=wpoxgit&tab=github" title="GitHub" class="nav-tab<?php echo $tab === 'github' ? ' nav-tab-active' : null; ?>"><i class="fa fa-github"></i>&nbsp; GitHub</a>
    <a href="?page=wpoxgit&tab=bitbucket" title="Bitbucket" class="nav-tab<?php echo $tab === 'bitbucket' ? ' nav-tab-active' : null; ?>"><i class="fa fa-bitbucket"></i>&nbsp; Bitbucket</a>
    <a href="?page=wpoxgit&tab=gitlab" title="GitLab" class="nav-tab<?php echo $tab === 'gitlab' ? ' nav-tab-active' : null; ?>"><i class="fa fa-gitlab"></i>&nbsp; GitLab</a>
    <a href="?page=wpoxgit&tab=log" title="Log" class="nav-tab<?php echo $tab === 'log' ? ' nav-tab-active' : null; ?>"><i class="fa fa-file-o"></i>&nbsp; Log</a>
    <a href="http://docs.wpoxgit.com/" target="_blank" class="nav-tab"><i class="fa fa-book"></i>&nbsp; Documentation</a>
    <a href="https://wpoxgit.com/support" target="_blank" class="nav-tab"><i class="fa fa-life-ring"></i>&nbsp; Help</a>
    <a href="?page=wpoxgit&tab=troubleshooting" title="Troubleshooting" class="nav-tab<?php echo $tab === 'troubleshooting' ? ' nav-tab-active' : null; ?>">Troubleshooting</a>
    <a href="?page=wpoxgit&tab=branch" title="Log" class="nav-tab<?php echo $tab === 'branch' ? ' nav-tab-active' : null; ?>">Branch - CI/CD for WordPress</a>
</h2>

<?php require $tabView; ?>
