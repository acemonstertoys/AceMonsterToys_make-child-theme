<?php
/**
* Template Name: Member Directory

 * @package Make
 */

get_header();
global $post;
?>

<?php ttfmake_maybe_show_sidebar( 'left' ); ?>

<main id="site-main" class="site-main" role="main">

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
		$template_type = apply_filters( 'make_template_content_page', 'page', $post );
		get_template_part( 'partials/content', $template_type );
		?>
		<?php get_template_part( 'partials/content', 'comments' ); ?>
	<?php endwhile; ?>

<?php endif; ?>

<?php $args = array(
'blog_id' => $GLOBALS['blog_id'],
'role' => '',
'meta_key' => 'first_name',
'meta_value' => '',
'meta_compare' => '',
'meta_query' => array(),
'date_query' => array(),
'include' => array(),
'exclude' => array(),
'order' => 'ASC',
'offset' => '',
'search' => '',
'number' => '',
'count_total' => false,
'fields' => 'all',
'who' => '',
'orderby' => 'first_name'
);
$users = get_users( $args ); ?>

<?php 
foreach($users as $user){ 
	$monstercorps = wc_memberships_is_user_active_member($user, 'monster-corps-membership');
	$ops = wc_memberships_is_user_active_member($user, 'ops-membership');
	$amt = wc_memberships_is_user_active_member($user, 'amt-membership');
	if (!($ops || $amt || $monstercorps) ) continue;
?>
<div class="amt-directory-card">




<?php

$type = 'products';
$args=array(
  'post_type' => 'amt_profile',
  'post_status' => 'any',
  'author' => $user->ID,
  'posts_per_page' => -1
);



$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {

	$amt_profile_posts = $my_query->get_posts();

	foreach($amt_profile_posts as $post) {
			$amt_profile_link = get_permalink($post);
	}
}
wp_reset_query();

?>


	<div class="amt-dir-mug">
		<?php 
		$dir_img_fld = get_field('amt_directory_picture', 'user_'.$user->ID);
		if($dir_img_fld) {
			echo '<img class="amt-dir-img" src="'.$dir_img_fld['url'].'" alt="'.$dir_img_fld['alt'].'">';
		}
		else {
			echo '<img class="amt-dir-img" src="../wp-content/uploads/2016/09/icon-gears-ghost-member.png" alt="person avatar">';
		}
		?>

	</div>
	<div class="amt-dir-user-info">
	<h2 class="amt-dir-name">

<?php 

		$profile_link_display = '';
			if ($user->first_name != '') 
			{
		    $profile_link_display .= $user->first_name;
				if ($user->last_name != '')
				  $profile_link_display .= ' '.$user->last_name[0] . '.';
			}
			else $profile_link_display .= $user->display_name;
		echo '<a href="'.get_amt_profile_page_link($user).'">'.$profile_link_display.'</a>';

		  
?>

</h2>
		<p class="amt-dir-title"><?php the_field('amt_functional_title', 'user_'.$user->ID); ?></p>
		<p>Slack handle: <?php if ($user->amt_slack_handle != '') echo '&#64;'.$user->amt_slack_handle; ?></p>	
		<p>Shareable Skills: <?php 

		$terms = get_field('sharable_skills', 'user_'.$user->ID);

		if( $terms ): 
			foreach( $terms as $term ): 
				?><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php 
				if (next($terms) == true) echo ", ";
			endforeach; 
		endif; ?>
		<p>Want to learn: <?php 

		$terms = get_field('want_to_learn', 'user_'.$user->ID);

		if( $terms ): 
			foreach( $terms as $term ): 
				?><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php 
				if (next($terms) == true) echo ", ";
			endforeach; 
		endif; ?>
	</div>
</div>
<?php } ?>

<?php else: ?>
<h2>Oopsie, Looks like you are trying to access information for AMT Members.</h2>
<p>To get the goodies please <a href="https://www.acemonstertoys.org/wp-login.php">login</a> or <a href="https://www.acemonstertoys.org/wp-login.php">Join AMT by paying dues</a>.</p>
<?php endif; ?>




</main>

<?php ttfmake_maybe_show_sidebar( 'right' ); ?>

<?php get_footer(); ?>

