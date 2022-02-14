<?php

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

?><h2>Install New Theme</h2>

<form action="" method="POST">
    <?php wp_nonce_field('install-theme'); ?>
    <input type="hidden" name="wpoxgit[action]" value="install-theme">
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label>Repository host</label>
                </th>
                <td>
                    <input id="radio-gh" name="wpoxgit[type]" type="radio" value="gh" checked> <label for="radio-gh"><i class="fa fa-github"></i> GitHub &nbsp;</label>
                    <input id="radio-bb" name="wpoxgit[type]" type="radio" value="bb" <?php if (isset($_POST['wpoxgit']['type']) && $_POST['wpoxgit']['type'] === 'bb') echo 'checked'; ?>> <label for="radio-bb"><i class="fa fa-bitbucket"></i> Bitbucket &nbsp;</label>
                    <input id="radio-gl" name="wpoxgit[type]" type="radio" value="gl" <?php if (isset($_POST['wpoxgit']['type']) && $_POST['wpoxgit']['type'] === 'gl') echo 'checked'; ?>> <label for="radio-gl"><i class="fa fa-gitlab"></i> GitLab &nbsp;</label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Theme repository</label>
                </th>
                <td>
                    <input id="wpoxgit-repository-name" name="wpoxgit[repository]" type="text" class="regular-text" value="<?php echo (isset($_POST['wpoxgit']['repository'])) ? $_POST['wpoxgit']['repository'] : ''; ?>">
                    <button id="pick-from-gh-btn" class="button button-default" onclick="window.open('https://cloud.wpoxgit.com/repositories/github', 'WP Oxgit Cloud', 'height=800,width=1100'); document.getElementById('wpoxgit-repository-name').focus(); document.getElementById('wpoxgit-repository-name').placeholder = 'Now, paste it here!'; return false;"><i class="fa fa-github"></i>&nbsp; Pick from GitHub</button>
                    <p class="description">Example: wpoxgit/awesome-wordpress-theme</p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Repository branch</label>
                </th>
                <td>
                    <input name="wpoxgit[branch]" type="text" class="regular-text" placeholder="master, main, development etc." value="<?php echo (isset($_POST['wpoxgit']['branch'])) ? $_POST['wpoxgit']['branch'] : ''; ?>">
                    <p class="description">Defaults to <strong>master</strong> if left blank</p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Repository subdirectory</label>
                </th>
                <td>
                    <input name="wpoxgit[subdirectory]" type="text" class="regular-text" placeholder="Optional" value="<?php echo (isset($_POST['wpoxgit']['subdirectory'])) ? $_POST['wpoxgit']['subdirectory'] : ''; ?>">
                    <p class="description">Only relevant if your theme resides in a subdirectory of the repository.</p>
                    <p class="description">Example: <strong>awesome-theme</strong> or <strong>plugins/awesome-theme</strong></p>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <label><input type="checkbox" name="wpoxgit[private]" <?php if (isset($_POST['wpoxgit']['private'])) echo 'checked'; ?> <?php echo ($hasValidLicense) ? null : 'disabled'; ?>> <i class="fa fa-lock" aria-hidden="true"></i> Repository is private</label>
                    <?php if ( ! $hasValidLicense) { ?>
                        <p class="description">You need a license to use private repositories. <a href="https://wpoxgit.com/?utm_source=plugin&utm_medium=install_package#pricing">Get one here.</a></p>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label></label>
                </th>
                <td>
                    <label><input type="checkbox" name="wpoxgit[ptd]" <?php if (isset($_POST['wpoxgit']['ptd'])) echo 'checked'; ?>> <i class="fa fa-refresh" aria-hidden="true"></i> Push-to-Deploy</label>
                    <p class="description">Automatically update on every push. Read about setup <a target="_blank" href="http://docs.wpoxgit.com/article/24-automatic-updates-with-push-to-deploy">here</a>.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <label><input type="checkbox" name="wpoxgit[dry-run]" <?php if (isset($_POST['wpoxgit']['dry-run'])) echo 'checked'; ?>> <i class="fa fa-link" aria-hidden="true"></i> Link installed theme</label>
                    <p class="description">Let WP Oxgit take over an already installed theme</p>
                    <p class="description">Folder name <strong>must</strong> have the same name as repository</p>
                </td>
            </tr>
        </tbody>
    </table>
    <?php submit_button('Install theme'); ?>
</form>

<script>
    var ghBtn = document.getElementById('pick-from-gh-btn');
    var ghRadio = document.getElementById('radio-gh');
    var bbRadio = document.getElementById('radio-bb');
    var glRadio = document.getElementById('radio-gl');

    ghRadio.addEventListener('click', function(e) {
        ghBtn.style.display = 'inline-block';
    });
    bbRadio.addEventListener('click', function(e) {
        ghBtn.style.display = 'none';
    });
    glRadio.addEventListener('click', function(e) {
        ghBtn.style.display = 'none';
    });
</script>
