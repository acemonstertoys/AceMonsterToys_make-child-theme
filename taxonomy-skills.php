<?php
/**
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


<?php

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?><h1><?php echo $term->name; ?></h1><?php

// WP_User_Query arguments
$args = array (
	'fields' => 'all',
);

$user_query = new WP_User_Query( $args );


?>
<div class="left"><h2 class="mad-skillz-hdr">People with skills to share</h2><?php
$count = 0;
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		if (empty($user->sharable_skills) || !in_array($term->term_id, $user->sharable_skills)) continue;
		//echo $user->display_name ."<br>";
                $amt_profile_link = get_amt_profile_page_link($user);
		echo '<a href="'.$amt_profile_link.'">'.$user->display_name.'</a>'."<br>";
                
		$count++;
	}
if ($count == 0)
	echo "Nobody found :(<br>";
}

?></div><div class="right"><h2 class="mad-skillz-hdr">People who want to learn</h2><?php
$count = 0;
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		if (empty($user->want_to_learn) || !in_array($term->term_id, $user->want_to_learn)) continue;
		// echo $user->display_name ."<br>";
                $amt_profile_link = get_amt_profile_page_link($user);
		echo '<a href="'.$amt_profile_link.'">'.$user->display_name.'</a>'."<br>";

		$count++;
	}
if ($count == 0)
	echo "Nobody found :(<br>";
}
?></div>

<?php else: ?>
<h2>Oopsie, Looks like you are trying to access information for AMT Members.</h2>
<p>To get the goodies please <a href="https://www.acemonstertoys.org/wp-login.php">login</a> or <a href="https://www.acemonstertoys.org/wp-login.php">Join AMT by paying dues</a>.</p>
<?php endif; ?>

</main>

<?php ttfmake_maybe_show_sidebar( 'right' ); ?>

<?php get_footer(); ?>
