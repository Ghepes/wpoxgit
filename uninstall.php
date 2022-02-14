<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit; // Exit if accessed directly
}

require 'wpoxgit.php';

$oxgit->make('Oxgit\Storage\Database')->uninstall();

// Deactivate license
$client = $oxgit->make('Oxgit\License\LicenseApi');

$key = get_option('wpoxgit_license_key', false);

if ($key) {
    $client->removeLicenseFomSite($key);
}

// Clean up
delete_option('hide-wpoxgit-welcome');
delete_option('wpoxgit_token');
delete_option('wpoxgit_license_key');
delete_option('gh_token');
delete_option('bb_user');
delete_option('bb_pass');
delete_option('bb_token');
delete_option('gl_base_url');
delete_option('gl_private_token');
delete_option('oxgit_logging_enabled');
