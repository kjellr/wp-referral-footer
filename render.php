<div class="wp-footer">
	<?php 
		/**
		 * Fetch plugin settings
		 */
		$wpcom_referral_footer_options = get_option( 'wpcom_referral_footer_settings' );
	?>

	<style type="text/css">
		/* Logo Color */
		.wp-footer .wp-footer__logo path {
			fill: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_logo_color']; ?>;
		}

		/* Text Color */
		.wp-footer .wp-footer__headline,
		.wp-footer .wp-footer__body {
			color: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_text_color']; ?>;
		}
		.wp-footer .wp-footer__arrow path {
			fill: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_text_color']; ?>;
		}

		/* Hover Color */
		.wp-footer .wp-footer__link:hover .wp-footer__headline,
		.wp-footer .wp-footer__link:hover .wp-footer__body {
			color: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_hover_color']; ?>;
		}
		.wp-footer .wp-footer__link:hover .wp-footer__arrow path {
			fill: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_hover_color']; ?>;
		}

		/* Border Color */
		.wp-footer {
			border-color: <?php echo $wpcom_referral_footer_options['wpcom_referral_footer_field_dividers_color']; ?>;
		}

		/* Hide Default Footer */
		<?php if ( $wpcom_referral_footer_options['wpcom_referral_footer_field_poweredby_class'] ) {
			echo "." . esc_html( $wpcom_referral_footer_options['wpcom_referral_footer_field_poweredby_class'] ) . '{ display: none; }'; 
		} ?>
	</style>

	<div class="wp-footer__container">
		<svg class="wp-footer__logo" width="36" height="36" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><title>WordPress Logo</title><path d="M18 0c-9.925 0-18 8.075-18 17.999 0 9.926 8.075 18.001 18 18.001s18-8.075 18-18.001c0-9.925-8.075-17.999-18-17.999zm-16.183 17.999c0-2.346.503-4.574 1.401-6.587l7.72 21.151c-5.399-2.623-9.121-8.158-9.121-14.564zm16.183 16.185c-1.589 0-3.122-.234-4.572-.659l4.856-14.11 4.974 13.629.116.222c-1.682.592-3.489.918-5.374.918zm2.23-23.772c.974-.051 1.852-.154 1.852-.154.872-.103.77-1.385-.103-1.334 0 0-2.621.206-4.314.206-1.59 0-4.262-.206-4.262-.206-.873-.051-.975 1.282-.102 1.334 0 0 .825.103 1.697.154l2.521 6.908-3.542 10.621-5.893-17.529c.975-.051 1.852-.154 1.852-.154.872-.103.769-1.385-.104-1.334 0 0-2.621.206-4.313.206-.303 0-.661-.008-1.042-.02 2.894-4.393 7.868-7.294 13.522-7.294 4.213 0 8.049 1.611 10.928 4.249l-.209-.013c-1.59 0-2.718 1.385-2.718 2.873 0 1.334.769 2.462 1.59 3.795.615 1.078 1.334 2.462 1.334 4.463 0 1.386-.411 3.129-1.231 5.232l-1.614 5.393-5.848-17.396zm5.906 21.575l4.943-14.291c.924-2.309 1.231-4.155 1.231-5.796 0-.596-.039-1.149-.109-1.664 1.263 2.305 1.982 4.95 1.982 7.764 0 5.97-3.236 11.183-8.047 13.988z" fill="#0087BE"/></svg>
		<div class="wp-footer__text">
			<a href="<?php echo esc_url( $wpcom_referral_footer_options['wpcom_referral_footer_field_refer_url'] ); ?>" class="wp-footer__link">
				<h2 class="wp-footer__headline"><?php _e( 'Proudly powered by WordPress'); ?></h2>
				<p class="wp-footer__body">
					<?php _e( 'Create your own site at WordPress.com'); ?>
					<svg class="wp-footer__arrow" width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><title>arrow-right</title><path d="M1.502 16l8.498-8-8.498-8-1.502 1.414 6.996 6.586-6.996 6.586z" fill="#555"/></svg>
				</p>
			</a>
		</div>
	</div>
</div>