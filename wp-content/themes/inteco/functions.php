<?php
define("THEME_URL", get_template_directory_uri());
function theme_setting() {
	$defaults = array(
		'flex-height' => true,
		'flex-width'  => true,
	);
	add_theme_support( 'custom-logo', $defaults );
	add_theme_support('post-thumbnails');
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'primary' => 'Primary',
			'social' => 'Social Links Menu',
		)
	);
}
add_action( 'after_setup_theme', 'theme_setting' );
