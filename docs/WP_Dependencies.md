# OBJECTS

A helper class for use with WordPress site dependencies such as themes, plugins etc.

## Install Plugins

Sometimes you need to plugins installed in your test environment. This class has a few helper methods for downloading and installing plugins. 

### From Remove .zip

This method allows you to pass just the URL to a plugin, either WordPress plugin directory, git or any other publically accessible url.

```php 
// Set a constant for the path to the test install path
$wp_install_path = dirname( __FILE__, 2 ) . '/wordpress';
define( 'TEST_WP_ROOT', $wp_install_path );

// Inside your wpunit bootstrap file.
tests_add_filter(
	'muplugins_loaded',
	function() {
        // Attempt to download the plugin. Throws exceptions if fails, so wrap in a try/catch.
        try {
			WP_Dependencies::install_remote_plugin_from_zip(
                'https://some.url/file.zip', 
                TEST_WP_ROOT
            );
		} catch (\Throwable $th) {
			print "Failed to install plugin";
            print $th->getMessage();
            print "Cancelling setup";
            exit;
		}
	}

    // Once installed, its just a case of activating and runing any setup needed.
    require_once  TEST_WP_ROOT . '/wp-content/plugins/achme_plugin/plugin.php';
    add_option('ache_setting', 1);
    add_option('ache_setting_2', 'disabled');
);