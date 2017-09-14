<?php
/**
 * WordPress.com Referral Footer
 *
 * @package     ReferralFooter
 * @author      Kjell Reigstad
 * @copyright   2017 Your Name or Company Name
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: WordPress.com Referral Footer
 * Plugin URI:  http://kjellr.com
 * Description: Displays a "Powered by WordPress" footer element with a referral footer.
 * Version:     0.1
 * Author:      Kjell Reigstad
 * Author URI:  http://kjellr.com
 * Text Domain: wpcom-referral-footer
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class ReferralFooter {
	
	function __construct() {
		add_action( 'admin_menu', array( $this, 'wpcom_referral_footer_options' ) );
		add_action( 'get_footer', array( $this, 'wpcom_referral_footer_render' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wpcom_referral_footer_css' ) );
	}

	/**
	 * Add the "Referral Footer" item to WP-Admin
	 */
	function wpcom_referral_footer_options() {
		add_theme_page( 'WordPress.com Referral Footer Options', 'Referral Footer', 'manage_options', 'wpcom_referral_footer_options', array( $this, 'wpcom_referral_footer_options_content' ) );
	}

	/**
	 * Include the plugin settings page, but only if
	 * the current user has the correct permissions.
	 */
	function wpcom_referral_footer_options_content() { ?>

		<div class="wrap">
			<h1 class="wp-heading-inline"><?php _e( 'WordPress.com Referral Footer' ); ?></h1>

			<form action="#">
				<br />
				<h2 class="title"><?php _e( 'Setup' ); ?></h2>
				<table class="form-table">
					<tbody>
						<tr class="form-field">
							<th scope="row">
								<label for="referral_url"><?php _e( 'Your Referral URL' ); ?></label>
							</th>
							<td>
								<input name="referral_url" type="text" id="user_login" value="" style="width:25em;">
							</td>
						</tr>
					</tbody>
				</table>
				<br /><br />
				<h2 class="title"><?php _e( 'Style Customization' ); ?></h2>
				<table class="form-table">
					<tbody>
						<tr class="form-field">
							<th scope="row">
								<label for="logo_color"><?php _e( 'Logo Color' ); ?></label>
							</th>
							<td>
								<input name="logo_color" type="text" id="user_login" value="" style="width:10em;" maxlength="7">
							</td>
						</tr>
						<tr class="form-field">
							<th scope="row">
								<label for="text_color"><?php _e( 'Text Color' ); ?></label>
							</th>
							<td>
								<input name="text_color" type="text" id="user_login" value="" style="width:10em;" maxlength="7">
							</td>
						</tr>
						<tr class="form-field">
							<th scope="row">
								<label for="hover_color"><?php _e( 'Hover Color' ); ?></label>
							</th>
							<td>
								<input name="hover_color" type="text" id="user_login" value="" style="width:10em;" maxlength="7">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
			
	<?php }

	/**
	 * Include the footer element itself.
	 */
	function wpcom_referral_footer_render() {
		include( 'render.php' );
	}

	/**
	 * Register + enqueue the footer stylesheet.
	 */
	function wpcom_referral_footer_css() {
		wp_enqueue_style(  'wpcom-referral-footer-styles', plugins_url( 'style.css', __FILE__ ) );
	}

}

new ReferralFooter;