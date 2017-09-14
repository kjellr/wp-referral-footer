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

		wp_enqueue_style( 'wpcom-referral-footer-styles', plugins_url( 'style.css', __FILE__ ) );
	}

	/**
	 * Add the "Referral Footer" item to WP-Admin
	 */
	function wpcom_referral_footer_options() {
		add_theme_page( 'WordPress.com Referral Footer Options', 'Referral Footer', 'manage_options', 'wpcom_referral_footer_options', array( $this, 'wpcom_referral_footer_options_content' ) );
	}

	/**
	 * Include the plugin settings page.
	 */
	function wpcom_referral_footer_options_content() {
		include( 'config.php' );
	}

	/**
	 * Include the footer element itself.
	 */
	function wpcom_referral_footer_render() {
		include( 'render.php' );
	}
	

}

new ReferralFooter;