<?php
/**
 * @package TimerCountDown
 */
/*
Plugin Name: Timer Countdown
Plugin URI: http:wirenomads.com
Description: Timer Countdown allows you to create countless timer models that suit the style of your website. Use the [timer-countdown] shortcode in the pages where you want to display the timer.
Author: Yaidier Perez
Version: 1.0
Author URI: 
License: GPLv2 or later
*/

/*
Copyright (C) 2020  Yaidier Perez

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if (!defined('ABSPATH')){
	die;
}

class TimerCountDown {

	public $my_plugin_name;

	function __construct() {		
		$this->my_plugin_name = plugin_basename(__FILE__);
	}
	
	function register(){		
		
		add_action('admin_menu', array($this, 'add_admin_pages'));

		add_filter("plugin_action_links_$this->my_plugin_name", array($this, 'settings_link'));		

		add_shortcode('timer-countdown', array($this, 'includeme_call'));
	}
	
	function includeme_call($content = null) {
    
		$file = strip_tags(plugin_dir_path(__FILE__) . '/templates/output.php'); 
		ob_start();
        include($file);
        $buffer = ob_get_clean();
        $options = get_option('includeme', array());
        if (isset($options['shortcode'])) {
            $buffer = do_shortcode($buffer);
        }
    
    return $buffer;
    }


	public function settings_link( $links ) {
		$settings_link = '<a href="admin.php?page=timer_countdown_plugin"> Settings</a>';
		array_push($links, $settings_link);
		return $links;
		//add
	}

	public function add_admin_pages() {
		add_menu_page('Timer-Countdown-Plugin', 'Timer Countdown', 'manage_options', 'timer_countdown_plugin', array( $this, 'admin_index' ), 'dashicons-clock', 110 );
	}

	public function admin_index() {		
		require_once plugin_dir_path(__FILE__) . '/templates/admin.php';
	}

	function activate(){
	}

	function deactivate(){
	}

	function uninstall(){
		delete_option('Timer CountDown');  
        delete_option('Timer CountDown Templates');
	}
}

if (class_exists('TimerCountDown')){
	$timer_count_down = new TimerCountDown();	
	$timer_count_down->register();
}


//activation
register_activation_hook( __FILE__, array($timer_count_down, 'activate'));

//deactivation
register_deactivation_hook( __FILE__, array($timer_count_down, 'deactivate'));

//uninstall
register_deactivation_hook( __FILE__, array($timer_count_down, 'uninstall'));