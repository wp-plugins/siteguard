<?php

class SiteGuard_Htaccess extends SiteGuard_Base {
	public static $htaccess_mark_start = '#SITEGUARD_PLUGIN_SETTINGS_START';
	public static $htaccess_mark_end   = '#SITEGUARD_PLUGIN_SETTINGS_END';

	function __construct( ) {
	}
	static function get_htaccess_file( ) {
		return ABSPATH.'.htaccess';
	}
	static function get_tmp_dir( ) {
		return SITEGUARD_PATH . 'tmp/';
	}
	static function get_htaccess_new_file( ) {
		return tempnam( SiteGuard_Htaccess::get_tmp_dir( ), 'htaccess_' );
	}
	static function make_tmp_dir( ) {
		$dir = SiteGuard_Htaccess::get_tmp_dir( );
		if ( ! wp_mkdir_p( $dir ) ) {
			$this->error_log( "make tempdir failed: $dir" );
			return false;
		}
		$htaccess_file = $dir . '.htaccess';

		if ( file_exists( $htaccess_file ) ) {
			return true;
		}

		if ( $handle = @fopen( $htaccess_file, 'w' ) ) {
			fwrite( $handle, 'Order deny,allow' . "\n" );
			fwrite( $handle, 'Deny from all' . "\n" );
			fclose( $handle );
		}

		return true;
	}
	function clear_settings( $mark ) {
		if ( ! SiteGuard_Htaccess::make_tmp_dir( ) ) {
			return false;
		}
		if ( '' == $mark ) {
			$mark_start = SiteGuard_Htaccess::$htaccess_mark_start;
			$mark_end   = SiteGuard_Htaccess::$htaccess_mark_end;
		} else {
			$mark_start = $mark . '_START';
			$mark_end   = $mark . '_END';
		}
		$flag_settings = false;
		$current_file = SiteGuard_Htaccess::get_htaccess_file( );
		if ( ! file_exists( $current_file ) ) {
			@touch( $current_file );
			@chmod( $current_file, 0604 );
		}
		$fr = @fopen( $current_file, 'r' );
		if ( null == $fr ) {
			$this->error_log( "fopen failed: $current_file" );
			return false;
		}
		$new_file = SiteGuard_Htaccess::get_htaccess_new_file( );
		$fw = @fopen( $new_file, 'w' );
		if ( null == $fw ) {
			$this->error_log( "fopen failed: $new_file" );
			return false;
		}
		while ( ! feof( $fr ) ) {
			$line = fgets( $fr, 4096 );
			if ( false !== strpos( $line, $mark_start ) ) {
				$flag_settings = true;
			}
			if ( false == $flag_settings ) {
				fputs( $fw, $line, 4096 );
			}
			if ( true == $flag_settings && false !== strpos( $line, $mark_end ) ) {
				$flag_settings = false;
			}
		}
		fclose( $fr );
		fclose( $fw );
		@chmod( $new_file, 0604 );
		if ( ! rename( $new_file, $current_file ) ) {
			$this->error_log( "rename failed: $new_file $current_file" );
			return false;
		}
		return true;
	}
	function update_settings( $mark, $data ) {
		if ( ! SiteGuard_Htaccess::make_tmp_dir( ) ) {
			return false;
		}
		$flag_write = false;
		$flag_through  = true;
		$mark_start = $mark . '_START';
		$mark_end   = $mark . '_END';
		$current_file = SiteGuard_Htaccess::get_htaccess_file( );
		if ( ! file_exists( $current_file ) ) {
			@touch( $current_file );
			@chmod( $current_file, 0604 );
		}
		if ( ! is_readable( $current_file ) ) {
			$this->error_log( "file not readable: $current_file" );
			return false;
		}
		$fr = @fopen( $current_file, 'r' );
		if ( null == $fr ) {
			$this->error_log( "fopen failed: $current_file" );
			return false;
		}
		$new_file = SiteGuard_Htaccess::get_htaccess_new_file( );
		if ( ! is_writable( $new_file ) ) {
			$this->error_log( "file not writable: $new_file" );
			return false;
		}
		$fw = @fopen( $new_file, 'w' );
		if ( null == $fw ) {
			$this->error_log( "fopen failed: $new_file" );
			return false;
		}
		while ( ! feof( $fr ) ) {
			$line = fgets( $fr, 4096 );
			if ( false !== strpos( $line, $mark_start ) ) {
				fwrite( $fw, $line , strlen( $line ) );
				fwrite( $fw, $data, strlen( $data ) );
				$flag_write = true;
				$flag_through  = false;
				continue;
			}
			if ( false == $flag_write && false !== strpos( $line, SiteGuard_Htaccess::$htaccess_mark_end ) ) {
				fwrite( $fw, $mark_start . "\n", strlen( $mark_start ) + 1 );
				fwrite( $fw, $data, strlen( $data ) );
				fwrite( $fw, $mark_end . "\n", strlen( $mark_end ) + 1 );
				$flag_write = true;
			}
			if ( false == $flag_through && false !== strpos( $line, $mark . '_END' ) ) {
				$flag_through = true;
			}
			if ( $flag_through ) {
				fwrite( $fw, $line, strlen( $line ) );
			}
		}
		if ( false == $flag_write ) {
			fwrite( $fw, SiteGuard_Htaccess::$htaccess_mark_start . "\n", strlen( SiteGuard_Htaccess::$htaccess_mark_start ) + 1 );
			fwrite( $fw, $mark_start . "\n", strlen( $mark_start ) + 1 );
			fwrite( $fw, $data, strlen( $data ) );
			fwrite( $fw, $mark_end . "\n", strlen( $mark_end ) + 1 );
			fwrite( $fw, SiteGuard_Htaccess::$htaccess_mark_end . "\n", strlen( SiteGuard_Htaccess::$htaccess_mark_end ) + 1 );
		}
		fclose( $fr );
		fclose( $fw );
		@chmod( $new_file, 0604 );
		if ( ! rename( $new_file, $current_file ) ) {
			$this->error_log( "rename failed: $new_file $current_file" );
			return false;
		}
		return true;
	}
}

?>
