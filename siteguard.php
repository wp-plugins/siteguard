<?php
/*
Plugin Name: SiteGuard WP Plugin
Plugin URI: http://www.jp-secure.com/cont/products/siteguard_wp_plugin/index_en.html
Description: Only installing SiteGuard WP Plugin on WordPress, its security can be improved. SiteGurad WP Plugin is the plugin specialized for the protection against the attack to the management page and login. It also have the function to create the exclude rule for WAF (SiteGuard Lite, to use it, WAF should be installed on the Web server.)
Author: JP-Secure
Author URI: http://www.jp-secure.com/eng/
Text Domain: siteguard
Domain Path: /languages/
Version: 1.0.1
*/

/*  Copyright 2014 JP-Secure Inc (email : support@jp-secure.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SITEGUARD_PATH', plugin_dir_path( __FILE__ ) );
define( 'SITEGUARD_URL_PATH', plugin_dir_url( __FILE__ ) );

define( 'SITEGUARD_LOGIN_SUCCESS',   0 );
define( 'SITEGUARD_LOGIN_FAILED',    1 );
define( 'SITEGUARD_LOGIN_FAIL_ONCE', 2 );
define( 'SITEGUARD_LOGIN_LOCKED',    3 );

require_once( 'classes/siteguard-base.php' );
require_once( 'classes/siteguard-config.php' );
require_once( 'classes/siteguard-htaccess.php' );
require_once( 'classes/siteguard-admin-filter.php' );
require_once( 'classes/siteguard-rename-login.php' );
require_once( 'classes/siteguard-login-history.php' );
require_once( 'classes/siteguard-login-lock.php' );
require_once( 'classes/siteguard-captcha.php' );
require_once( 'classes/siteguard-disable-pingback.php' );
require_once( 'classes/siteguard-waf-exclude-rule.php' );
require_once( 'admin/siteguard-menu-init.php' );

global $htaccess;
global $config;
global $admin_filter;
global $rename_login;
global $loginlock;
global $captcha;
global $login_history;
global $pingback;
global $waf_exclude_rule;

$htaccess          = new SiteGuard_Htaccess( );
$config            = new SiteGuard_Config( );
$admin_filter      = new SiteGuard_AdminFilter( );
$rename_login      = new SiteGuard_RenameLogin( );
$loginlock         = new SiteGuard_LoginLock( );
$login_history     = new SiteGuard_LoginHistory( );
$captcha           = new SiteGuard_CAPTCHA( );
$pingback          = new SiteGuard_Disable_Pingback( );
$waf_exclude_rule  = new SiteGuard_WAF_Exclude_Rule( );

function siteguard_activate( ) {
	global $admin_filter, $rename_login, $login_history, $captcha, $loginlock, $pingback, $waf_exclude_rule;

	flush_rewrite_rules();
	$admin_filter->init();
	$rename_login->init();
	$login_history->init();
	$captcha->init();
	$loginlock->init();
	$pingback->init();
	$waf_exclude_rule->init();
}
register_activation_hook( __FILE__, 'siteguard_activate' );

function siteguard_deactivate( ) {
	global $config;
	flush_rewrite_rules();
	$config->set( 'siteguard_meta_version', '0.0' );
	$config->update( );
	SiteGuard_RenameLogin::feature_off( );
	SiteGuard_AdminFilter::feature_off( );
	SiteGuard_WAF_Exclude_Rule::feature_off( );
}
register_deactivation_hook( __FILE__, 'siteguard_deactivate' );

class SiteGuard extends SiteGuard_Base {
	var $menu_init;
	function __construct( ) {
		if ( is_admin( ) )  {
			$this->menu_init = new SiteGuard_Menu_Init( );
		}
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}
	function plugins_loaded( ) {
		load_plugin_textdomain(
			'siteguard',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}
}
$siteguard = new SiteGuard;
?>
