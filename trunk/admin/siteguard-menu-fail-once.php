<?php

class SiteGuard_Menu_Fail_Once extends SiteGuard_Base {
	function __construct( ) {
		$this->render_page( );
	}
	function render_page( ) {
		global $config;

		$opt_name_fail_once  = 'loginlock_fail_once';
		$opt_name_admin_only = 'fail_once_admin_only';

		$opt_val_fail_once  = $config->get( $opt_name_fail_once );
		$opt_val_admin_only = $config->get( $opt_name_admin_only );
		if ( isset( $_POST['update'] ) && check_admin_referer( 'siteguard-menu-fail-once-submit' ) ) {
			$error = false;
			$errors = check_multisite( );
			if ( is_wp_error( $errors ) ) {
				echo '<div class="error settings-error"><p><strong>';
				esc_html_e( $errors->get_error_message( ), 'siteguard' );
				echo '</strong></p></div>';
				$error = true;
			}
			if ( false == $error && false == $this->is_switch_value( $_POST[ $opt_name_fail_once ] ) ) {
				echo '<div class="error settings-error"><p><strong>';
				esc_html_e( 'ERROR: Invalid input value.', 'siteguard' );
				echo '</strong></p></div>';
				$error = true;
			}
			if ( false == $error ) {
				$opt_val_fail_once = $_POST[ $opt_name_fail_once ];
				if ( isset( $_POST[ $opt_name_admin_only ] ) ) {
					$opt_val_admin_only = $_POST[ $opt_name_admin_only ];
				} else {
					$opt_val_admin_only = '0';
				}
				$config->set( $opt_name_fail_once,  $opt_val_fail_once );
				$config->set( $opt_name_admin_only, $opt_val_admin_only );
				$config->update( );
				?>
				<div class="updated"><p><strong><?php esc_html_e( 'Options saved.', 'siteguard' ); ?></strong></p></div>
				<?php
			}
		}

		echo '<div class="wrap">';
		echo '<img src="' . SITEGUARD_URL_PATH . 'images/sg_wp_plugin_logo_40.png" alt="SiteGuard Logo" />';
		echo '<h2>' . esc_html__( 'Fail once', 'siteguard' ) . '</h2>';
		echo '<div class="siteguard-description">'
		. esc_html__( 'You can find docs about this function on ', 'siteguard' )
		. '<a href="' . esc_html__( 'http://www.jp-secure.com/cont/products/siteguard_wp_plugin/fail_once_en.html', 'siteguard' ) 
		. '" target="_blank">' 
		. esc_html__( 'here', 'siteguard' ) 
		. '</a>' 
		. esc_html__( '.', 'siteguard' ) 
		. '</div>';
		?>
		<form name="form1" method="post" action="">
		<table class="form-table">
		<tr>
		<th scope="row" colspan="2">
			<ul class="siteguard-radios">
			<li>
			<input type="radio" name="<?php echo $opt_name_fail_once ?>" id="<?php echo $opt_name_fail_once.'_on' ?>" value="1" <?php echo ( '1' == $opt_val_fail_once ? 'checked' : '') ?> >
			<label for="<?php echo $opt_name_fail_once.'_on' ?>"><?php esc_html_e( 'ON', 'siteguard' ) ?></label>
			</li><li>
			<input type="radio" name="<?php echo $opt_name_fail_once ?>" id="<?php echo $opt_name_fail_once.'_off' ?>" value="0" <?php echo ( '0' == $opt_val_fail_once ? 'checked' : '') ?> >
			<label for="<?php echo $opt_name_fail_once.'_off' ?>"><?php esc_html_e( 'OFF', 'siteguard' ) ?></label>
			</li>
			</ul>
			<?php
			$error = check_multisite( );
			if ( is_wp_error( $error ) ) {
				echo '<p class="description">';
				echo $error->get_error_message( );
				echo '</p>';
			}
			?>
		</th>
		<td>
		</tr><tr>
		<th scope="row"><?php esc_html_e( 'Target user', 'siteguard' ) ?></th>
		<td>
			<input type="checkbox" name="<?php echo $opt_name_admin_only ?>" id="<?php echo $opt_name_admin_only ?>" value="1" <?php echo ( '1' == $opt_val_admin_only ? 'checked' : '' ) ?> >
			<label for="<?php echo $opt_name_admin_only ?>"><?php esc_html_e( 'Admin only', 'siteguard' ) ?></label>
		</td>
		</tr>
		</table>
		<input type="hidden" name="update" value="Y">
		<div class="siteguard-description">
		<?php esc_html_e( 'It is the function to decrease the vulnerability against a password list attack. Even is the login input is correct, the first login must fail. After 5 seconds and later within 60 seconds, another correct login input make login succeed. At the first login failure, the following error message is displayed.', 'siteguard' ); ?>
		</div>
		<hr />

		<?php
		wp_nonce_field( 'siteguard-menu-fail-once-submit' );
		submit_button( );
		?>

		</form>
		</div>

		<?php
	}
}
?>
