<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
<div class="site-info">
	<div class="wrap">
		<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
		?>
		<?php
			/**
			* Fires before the Zeko footer text for footer customization.
			*
			* @since Zeko 1.0
			*/
			do_action( 'zeko_lite_credits' );
		?>
		<?php esc_attr_e('&copy;', 'zeko-lite'); ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'zeko_lite_copyright', 'Zeko Lite Theme by Anariel Design. Proudly powered by WordPress.' ) ); ?> </a>
	</div><!-- .wrap -->
</div><!-- .site-info -->
<?php } // end if ?>