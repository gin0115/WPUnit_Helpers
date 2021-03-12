<?php
/*
* Plugin Name: Gin0115 Hlper
* Plugin URI: https://github.com/gin0115/WPUnit_Helpers
* Description: This plugin does nothing
* Author: Glynn Quelch
* Version: 1.0.0
* Author URI: https://github.com/gin0115/WPUnit_Helpers
*/

use Gin0115\WPUnit_Helpers\WP\Menu_Page_Inspector;
use Gin0115\WPUnit_Helpers\WP\Entities\Menu_Page_Entity;
use Gin0115\WPUnit_Helpers\WP\WP_UnitTestCase\User_Factory_Trait;

include __DIR__ . '/vendor/autoload.php';



add_action(
	'admin_menu',
	function() {
		$r = Menu_Page_Inspector::initialise();
		// dump( Menu_Page_Inspector::initialise()->set_pages() );
		// dump( Menu_Page_Inspector::initialise()->set_pages()->find_parent( 'index.php' ) );
		// dump( $r->find_first_child( 'plugins.php' ) );
		// dump( $r, $r->find_all_child( 'crisis-ops-picker' ) );

		dump( $r );
		$r->render_page(
			$r->find( 'postman_email_log' )
		);
	}, 999999999
);
