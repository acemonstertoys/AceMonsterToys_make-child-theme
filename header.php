<?php
if (
	( current_user_can( 'blocked' ) )
	&& (
		( is_cart() )
		|| ( is_checkout() )
		|| ( is_page( 'my-account' ) )
	)
) {
	wp_die( 'Notice: Currently you are ineligible for AMT Membership. For more information contact board@acemonstertoys.org<br><br>
	<a href="' . site_url() . '">Back to site</a>.' );
}
if (
	( current_user_can( 'blockednsf' ) )
	&& (
		( is_single( 278 ) )
		|| ( is_single( 274 ) )
		|| ( is_single( 93859 ) )
	)
) {
	wp_die( 'Hello, currently there is an issue with an outstanding bill of yours. To restore your membership privileges please pay your bills promptly. <a href="/my-account/orders/">Click here to see your bills</a> Repeated instances of loosing your privileges due to unpaid bills may result in permanent loss of privileges.' );
}
/**
 * @package Make
 */
?><!DOCTYPE html>
<!--[if lte IE 9]><html class="no-js IE9 IE" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php
		if ( current_user_can( 'blocked' ) ) {
		?>
			<div class="notice">
				Notice: Currently you are ineligible for AMT Membership. For more information contact
				<a href="mailto:board@acemonstertoys.org">board@acemonstertoys.org</a>
			</div>
		<?php
		}

		if ( current_user_can( 'blockednsf' ) ) {
			?>
			<div class="notice">
				<big>Hello, currently there is an issue with an outstanding bill of yours. To restore your membership privileges please pay your bills promptly. <a href="/my-account/orders/">Click here to see your bills</a> Repeated instances of loosing your privileges due to unpaid bills may result in permanent loss of privileges.</big>
			</div>			
			<?php
		}
		?>
		<div id="site-wrapper" class="site-wrapper">
			<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'make' ); ?></a>

			<?php ttfmake_maybe_show_site_region( 'header' ); ?>

			<div id="site-content" class="site-content">
				<div class="container">