<?php
/**
 * @package Make
 */

$thumb_key    = 'layout-' . make_get_current_view() . '-featured-images';
$thumb_option = make_get_thememod_value( $thumb_key );

// Header
ob_start();
make_breadcrumb();

get_template_part( 'partials/entry', 'sticky' );
if ( 'post-header' === $thumb_option ) :
	get_template_part( 'partials/entry', 'thumbnail' );
endif;
get_template_part( 'partials/entry', 'title' );
get_template_part( 'partials/entry', 'meta-before-content' );
$entry_header = trim( ob_get_clean() );

// Footer
ob_start();
get_template_part( 'partials/entry', 'meta-post-footer' );
get_template_part( 'partials/entry', 'taxonomy' );
get_template_part( 'partials/entry', 'sharing' );
$entry_footer = trim( ob_get_clean() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( $entry_header ) : ?>
	<header class="entry-header">
	<!-- <p>this is an attempt to inject something before the title</p> -->




		<?php  $entry_header; ?>
	</header>
	<?php endif; ?>


		<?php


			$profile_user_id = get_the_author_meta( 'ID' );
?>
<div class="amt-profile-single-container">
	<div class="amt-profile-mug">
	<?php 
			$dir_img_fld = get_field('amt_directory_picture', 'user_'.$profile_user_id);
			if($dir_img_fld) {
				echo '<img class="amt-profile-img" src="'.$dir_img_fld['url'].'" alt="'.$dir_img_fld['alt'].'">';
			}
			else {
				echo '<img class="amt-profile-img" src="../../wp-content/uploads/2016/09/icon-gears-ghost-member.png" alt="person avatar">';
			}
			?>
	</div>
	<div class="amt-profile-user-info">		

	<h1 class="amt-profile-single-name"><?php the_field('first_name', 'user_'.$profile_user_id); 
	$lname = get_field('last_name', 'user_'.$profile_user_id);
	echo " ";
	echo substr($lname,0,1);
	?></h1>

	<p><em><?php the_field('amt_functional_title', 'user_'.$profile_user_id); ?></em></p>

	<p><span class="amt-profile-labels">Slack:</span> @<?php echo get_field('amt_slack_handle', 'user_'.$profile_user_id); ?></p>

	<p> <span class="amt-profile-labels">AMT Certifications:</span>
	<?php 
	$certs = get_field('has_taken_laser_class', 'user_'.$profile_user_id);
    $certobj = get_field_object('has_taken_laser_class', 'user_'.$profile_user_id);
    $certnames = $certobj['choices'];
	if( $certs ){
	    foreach( $certs as $cert ) {
            echo($certnames[$cert]);
			if (next($certs)) echo " | ";
        }
    }
	?></p>

	<p><span class="amt-profile-labels">Want to learn:</span>
	<?php 
			$terms = get_field('want_to_learn', 'user_'.$profile_user_id);

			if( $terms ):
				 foreach( $terms as $term ): 
					echo "<a href='" . get_term_link( $term ) . "'>" . $term->name ."</a>";
					if (next($terms)==true) echo ", ";
				endforeach;
			 endif;  ?></p>

	<p><span class="amt-profile-labels">Shareable Skills:</span>
	<?php 
	$terms = get_field('sharable_skills', 'user_'.$profile_user_id);
			if( $terms ):
				 foreach( $terms as $term ): 
					echo "<a href='" . get_term_link( $term ) . "'>" . $term->name ."</a>";
					if (next($terms)==true) echo ", ";
				endforeach;
			 endif;

			?></p>
	</div>
</div>

	<div class="entry-content">
		<?php if ( 'thumbnail' === $thumb_option ) : ?>
			<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
		<?php endif; ?>
		
<!--
<p>attempting to verify that the right partial is being called. This business of partials seems like a never ending rabit hole when I read the code.</p> 
-->

		<?php get_template_part( 'partials/entry', 'contentAP' ); ?>

<!--rachel hacking things out of the table-->

<?php
$current_author = get_query_var('author');
$author_posts=  get_posts( 'author='.$profile_user_id.'&posts_per_page=-1' );
if($author_posts){

echo '<div class="amtp-list-linked"><h3 class="amtp-h3-extras">Post and Projects</h3>';
foreach ($author_posts as $author_post)  {
echo '<div class="ampt-post-block"><div class="ampt-post-th">';
 echo get_the_post_thumbnail($author_post->ID, $size = [150,150] );
echo '</div>
<div class="ampt-post-deets">';
 echo '<p><a href="'.get_permalink($author_post->ID).'" >'.$author_post->post_title.'</a><br/>';
 echo get_the_date('F j, Y', $author_post->ID);
echo '</p></div></div>';
}

echo '</div>';
}
?>

		<?php // get_template_part( 'partials/entry', 'pagination' ); ?>
	</div>

	<?php if ( $entry_footer ) : ?>
	<footer class="entry-footer">
<!--
	<p>verify that this is <?php the_author_meta(); ?> the footer where the hell does the post footer information come from? </p>
-->
		<?php  $entry_footer; ?>
	</footer>
	<?php endif; ?>

</article>