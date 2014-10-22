<?php

class SiteGuard_RenameLogin extends SiteGuard_Base {
	public static $htaccess_mark = '#==== SITEGUARD_RENAME_LOGIN_SETTINGS';

	function __construct( ) {
		global $config;
		if ( '1' == $config->get( 'renamelogin_enable' ) ) {
			$this->add_filter( );
		}
	}
	function get_mark( ) {
		return SiteGuard_RenameLogin::$htaccess_mark;
	}
	function init( ) {
		global $config;
		$config->set( 'renamelogin_path', 'login_' . sprintf( '%05d', mt_rand( 1, 99999 ) ) );
		if ( $this->check_module( 'rewrite' ) ) {
			$config->set( 'renamelogin_enable', '1' );
			$config->update( );
			$this->feature_on( );
		} else {
			$config->set( 'renamelogin_enable', '0' );
			$config->update( );
		}
	}
	function add_filter( ) {
		add_filter( 'login_init',       array( $this, 'handler_login_init' ),  10, 2 );
		add_filter( 'site_url',         array( $this, 'handler_site_url' ),    10, 2 );
		add_filter( 'network_site_url', array( $this, 'handler_site_url' ),    10, 2 );
		add_filter( 'wp_redirect',      array( $this, 'handler_wp_redirect' ), 10, 2 );
		add_filter( 'register',         array( $this, 'handler_register' ) );
		#remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
	}
	function handler_login_init( ) {
		global $config;
		$new_login_page = $config->get( 'renamelogin_path' );
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			$link = $_SERVER['REQUEST_URI'];
		} else {
			$link = '';
		}
		if ( false !== strpos( $link, 'wp-login.php' ) ) {
			$referer = wp_get_referer( );
			if ( false === strpos( $referer, $new_login_page ) ) {
				$this->set_404( );
			} else {
				$result = $this->convert_url( $link );
				wp_redirect( $result );
			}
		}
	}
	function convert_url( $link ) {
		global $config;
		$custom_login_url = $config->get( 'renamelogin_path' );
		if ( false !== strpos( $link, 'wp-login.php' ) ) {
			$result = str_replace( 'wp-login.php', $custom_login_url, $link );
		} else {
			$result = $link;
		}
		return $result;
	}
	function handler_site_url( $link ) {
		$result = $this->convert_url( $link );
		return $result;
	}
	function handler_register( $link ) {
		$result = $this->convert_url( $link );
		return $result;
	}
	function handler_wp_redirect( $link, $status_code ) {
		$result = $this->convert_url( $link );
		return $result;
	}
	function flush_rules( ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules( );
	}
	function insert_rewrite_rules( $rules ) {
		global $config;
		$custom_login_url = $config->get( 'renamelogin_path' );
		$newrules = array();
		$newrules[ $custom_login_url.'(.*)$' ] = 'wp-login.php$1';
		return $newrules + $rules;
	}
	function update_settings( ) {
		global $config;
		$custom_login_url = $config->get( 'renamelogin_path' );
		$parse_url = parse_url( site_url( ) );
		if ( false == $parse_url ) {
			$base = '/';
		} else {
			if ( isset( $parse_url['path'] ) ) {
				$base = $parse_url['path'] . '/';
			} else {
				$base = '/';
			}
		}

		$htaccess_str = "<IfModule mod_rewrite.c>\n";
		$htaccess_str .= "    RewriteEngine on\n";
		$htaccess_str .= "    RewriteBase $base\n";
		$htaccess_str .= "    RewriteRule $custom_login_url(.*)$ wp-login.php$1 [L]\n";
		$htaccess_str .= "</IfModule>\n";

		return $htaccess_str;
	}
	function feature_on( ) {
		global $htaccess, $config;

		$custom_login_url = $config->get( 'renamelogin_path' );
		add_rewrite_rule( $custom_login_url.'(.*)$', 'wp-login.php$1', 'top' );
		$this->flush_rules( );

		$data = $this->update_settings( );
		$mark = $this->get_mark( );
		$htaccess->update_settings( $mark, $data );
	}
	function feature_off( ) {

		flush_rewrite_rules( );

		$mark = SiteGuard_RenameLogin::get_mark( );
		SiteGuard_Htaccess::clear_settings( $mark );
	}
	function set_404( ) {
		global $wp_query;
		status_header( 404 );
		$wp_query->set_404( );
		if ( ( ( $template = get_404_template( ) ) || ( $template = get_index_template( ) ) )
		&& ( $template = apply_filters( 'template_include', $template ) ) ) {
			include( $template );
		}
		die;
	}
}

?>
