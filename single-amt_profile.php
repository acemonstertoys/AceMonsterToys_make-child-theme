<?php
/**
 * @package Make
 */

get_header();
global $post;
?>

<?php ttfmake_maybe_show_sidebar( 'left' ); ?>

<main id="site-main" class="site-main" role="main">
<!-- <p>Confirming it is calling this template</p> -->

<?php
$tuser = get_current_user_id();	
$tamt =  wc_memberships_is_user_active_member($tuser, 'amt-membership');
$tmonstercorps = wc_memberships_is_user_active_member($tuser, 'monster-corps-membership'); 
$tops = wc_memberships_is_user_active_member($tuser, 'ops-membership'); 
?>

<?php if ($tamt || $tmonstercorps || $tops): ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		/**
		 * Allow for changing the template partial.
		 *
		 * @since 1.2.3.
		 *
		 * @param string     $type    The default template type to use.
		 * @param WP_Post    $post    The post object for the current post.
		 */
		$template_type = apply_filters( 'make_template_content_single', 'single-amt_profile', $post );
		get_template_part( 'partials/content', $template_type );
		?>
		<?php // get_template_part( 'partials/nav', 'post' ); ?>
		<?php get_template_part( 'partials/content', 'comments' ); ?>
	<?php endwhile; ?>

<?php endif; ?>

<?php else: ?>
<h2>Oopsie, Looks like you are trying to access information for AMT Members.</h2>
<p>To get the goodies please <a href="https://www.acemonstertoys.org/wp-login.php">login</a> or <a href="https://www.acemonstertoys.org/wp-login.php">Join AMT by paying dues</a>.</p>
<?php endif; ?>

</main>

<?php ttfmake_maybe_show_sidebar( 'right' ); ?>

<?php get_footer(); ?>
