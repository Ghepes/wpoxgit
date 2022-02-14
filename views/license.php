<?php

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

?>

<br>

<?php settings_errors(); ?>

<form method="post" action="<?php echo admin_url(); ?>options.php">
    <?php settings_fields('oxgit-license-settings'); ?>
    <?php do_settings_sections('oxgit-license-settings'); ?>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">
                <label>License</label>
            </th>
            <td>
            <?php if ($license_key) { ?>
                <?php if ($license_key->hasExpired()) { echo "<p style=\"color: #a00;\">Your license key has expired.</p>"; } ?>
                <p>Your license has <strong><?php echo ($license_key->licenses() > 0) ? $license_key->licenses() : 'unlimited'; ?></strong> site installs. <strong><?php echo $license_key->usedLicenses(); ?></strong> of them are in use.</p>
                <p>Licenses are <i><a href="https://wpoxgit.com/faq#renewals">automatically being renewed</a></i>.</p>
            <?php } else { ?>
                <p><i>You haven't registered any license key for this installation. <strong><a href="https://wpoxgit.com/?utm_source=plugin&utm_medium=license_tab#pricing">Buy one here</a>.</i></strong></p>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label>License key</label>
            </th>
            <td>
                <input name="wpoxgit_license_key" type="text" id="wpoxgit_license_key" placeholder="<?php echo (get_option('wpoxgit_license_key')) ? '********' : null; ?>" class="regular-text" <?php echo (get_option('wpoxgit_license_key')) ? 'disabled' : null; ?>>
                &nbsp; <input type="submit" name="submit" id="submit" class="button" value="<?php echo (get_option('wpoxgit_license_key')) ? 'Revoke license from site' : 'Activate site license'; ?>">
            </td>
        </tr>
        </tbody>
    </table>
</form>
<br>
