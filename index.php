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
		define( 'REFERRALFOOTER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		
		add_action( 'admin_menu',				array( $this, 'wpcom_referral_footer_options' ) );
		add_action( 'get_footer',				array( $this, 'wpcom_referral_footer_render' ) );
		add_action( 'wp_enqueue_scripts', 		array( $this, 'wpcom_referral_footer_css' ) );
		add_action(	'admin_enqueue_scripts',	array( $this, 'wpcom_referral_footer_admin_css_js' ) );
		add_action( 'admin_init', 				array( $this, 'wpcom_referral_footer_settings_init' ) );
	}


	/**
	 * Add the "Referral Footer" item to WP-Admin
	 */
	function wpcom_referral_footer_options() {
		add_theme_page( 
			'WordPress.com Referral Footer Options', 
			'Referral Footer', 'manage_options', 
			'wpcom_referral_footer_options', 
			array( $this, 'wpcom_referral_footer_options_page' ) 
		);
	}


	/**
	 * Include the footer element itself.
	 */
	function wpcom_referral_footer_render() {
		require_once( REFERRALFOOTER__PLUGIN_DIR . 'render.php' );
	}


	/**
	 * Enqueue the footer stylesheets.
	 */
	function wpcom_referral_footer_css() {
		wp_enqueue_style( 'wpcom-referral-footer-styles', plugins_url( 'style.css', __FILE__ ) );
	}


	/**
	 * Enqueue the color picker javascript + styles.
	 */
	function wpcom_referral_footer_admin_css_js() { 
		wp_enqueue_script( 'scripts', plugins_url( 'scripts.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
		wp_enqueue_style( 'wp-color-picker' );
	}


	/**
	 * Register Plugin Settings
	 */
	function wpcom_referral_footer_settings_init() { 

		register_setting( 'ReferralFooterPage', 'wpcom_referral_footer_settings' );

		add_settings_section(
			'wpcom_referral_footer_ReferralFooterPage_setup', 
			__( 'Setup', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_settings_setup_callback' ), 
			'ReferralFooterPage'
		);

		add_settings_section(
			'wpcom_referral_footer_ReferralFooterPage_styles', 
			__( 'Styles', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_settings_styles_callback' ), 
			'ReferralFooterPage'
		);

		add_settings_field( 
			'wpcom_referral_footer_field_refer_url', 
			__( 'Referral URL', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_refer_url_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_setup' 
		);

		add_settings_field( 
			'wpcom_referral_footer_field_poweredby_class', 
			__( 'Default Footer Class', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_poweredby_class_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_setup' 
		);

		add_settings_field( 
			'wpcom_referral_footer_field_logo_color', 
			__( 'Logo Color', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_logo_color_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_styles' 
		);

		add_settings_field( 
			'wpcom_referral_footer_field_text_color', 
			__( 'Text Color', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_text_color_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_styles' 
		);

		add_settings_field( 
			'wpcom_referral_footer_field_hover_color', 
			__( 'Text Hover Color', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_hover_color_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_styles' 
		);

		add_settings_field( 
			'wpcom_referral_footer_field_dividers_color', 
			__( 'Dividers Color', 'wpcom-referral-footer' ), 
			array( $this, 'wpcom_referral_footer_field_dividers_color_render' ), 
			'ReferralFooterPage', 
			'wpcom_referral_footer_ReferralFooterPage_styles' 
		);

	}


	/**
	 * Settings Fields
	 */
	function wpcom_referral_footer_field_refer_url_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_refer_url]' value='<?php echo $options['wpcom_referral_footer_field_refer_url']; ?>'>
		<?php
	}

	function wpcom_referral_footer_field_poweredby_class_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_poweredby_class]' value='<?php echo $options['wpcom_referral_footer_field_poweredby_class']; ?>'>
		<?php
	}

	function wpcom_referral_footer_field_logo_color_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input class="wpcom-referral-footer-color-picker" type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_logo_color]' value='<?php echo $options['wpcom_referral_footer_field_logo_color']; ?>' maxlength="7">
		<?php
	}

	function wpcom_referral_footer_field_text_color_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input class="wpcom-referral-footer-color-picker" type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_text_color]' value='<?php echo $options['wpcom_referral_footer_field_text_color']; ?>' maxlength="7">
		<?php
	}

	function wpcom_referral_footer_field_hover_color_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input class="wpcom-referral-footer-color-picker" type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_hover_color]' value='<?php echo $options['wpcom_referral_footer_field_hover_color']; ?>' maxlength="7">
		<?php
	}

	function wpcom_referral_footer_field_dividers_color_render() {
		$options = get_option( 'wpcom_referral_footer_settings' );
		?>
		<input class="wpcom-referral-footer-color-picker" type='text' name='wpcom_referral_footer_settings[wpcom_referral_footer_field_dividers_color]' value='<?php echo $options['wpcom_referral_footer_field_dividers_color']; ?>' maxlength="7">
		<?php
	}


	/**
	 * Callback functions for each section
	 */
	function wpcom_referral_footer_settings_setup_callback() {
		echo __( '', 'wpcom-referral-footer' );
	}
	function wpcom_referral_footer_settings_styles_callback() {
		echo __( '', 'wpcom-referral-footer' );
	}


	/**
	 * Render the options page
	 */
	function wpcom_referral_footer_options_page() {
		?>
		<form action='options.php' method='post'>

			<h2>WordPress.com Referral Footer</h2>

			<?php
				settings_fields( 'ReferralFooterPage' );
				do_settings_sections( 'ReferralFooterPage' );
				submit_button();
			?>

		</form>
		<?php
	}

}

new ReferralFooter;