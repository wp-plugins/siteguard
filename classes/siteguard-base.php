<?php

class SiteGuard_Base {
	function __construct() {
	}
	function error_log( $message ) {
		$logfile = SITEGUARD_PATH . 'error.log';
		$f = @fopen( $logfile, 'a+' );
		if ( false != $f ) {
			fwrite( $f, date_i18n( 'Y/m/d H:i:s:' ) . $message . "\n" );
			fclose( $f );
		}
	}
	function error_dump( $title, $obj ) {
		ob_start();
		var_dump( $obj );
		$msg = ob_get_contents( );
		ob_end_clean( );
		$this->error_log( "$title: $msg" );
	}
	function is_switch_value( $value ) {
		if ( '0' == $value || '1' == $value ) {
			return true;
		}
		return false;
	}
	function check_module( $name, $default = false ) {
		if ( isset( $_SERVER['SERVER_SOFTWARE'] ) ) {
			return ( strpos( $_SERVER['SERVER_SOFTWARE'], 'Apache' ) !== false || strpos( $_SERVER['SERVER_SOFTWARE'], 'LiteSpeed' ) !== false);
		} else {
			return $default;
		}

		# It does not work in FastCGI well. 
		#$module = 'mod_' . $name;
		#return apache_mod_loaded( $module, $default );
		#if ( function_exists('phpinfo') ) {
		#	ob_start( );
		#	phpinfo(8);
		#	$phpinfo = ob_get_clean( );
		#	if ( false !== strpos( $phpinfo, $module ) ) {
		#		return true;
		#	}
		#}
		#return $default;
	}
	function is_active_plugin( $plugin ) {
		if ( function_exists('is_plugin_active') ) {
			return is_plugin_active( $plugin );
		} else {
			return in_array(
				$plugin,
				get_option('active_plugins')
			);
		}
	}
}

?>
