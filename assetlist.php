<?php
/*
Template Name: AMT Assets
 */
/**
 * @package Make
 */

get_header('assetlist');
global $post;
?>

<?php ttfmake_maybe_show_sidebar( 'left' ); ?>

<main id="site-main" class="site-main" role="main">
<?php
$tuser = get_current_user_id();
$tamt =  wc_memberships_is_user_active_member($tuser, 'amt-membership');
$tmonstercorps = wc_memberships_is_user_active_member($tuser, 'monster-corps-membership');
$tops = wc_memberships_is_user_active_member($tuser, 'ops-membership');

$valid = ($tamt || $tmonstercorps || $tops)?"Y":"N";
echo("<!-- Access: $tamt || $tmonstercorps || $tops || $valid -->");
        echo(file_get_contents("http://acemonstertoys.org/assets/?valid=$valid&id=".$_GET['id']));
?>
</main>

<?php ttfmake_maybe_show_sidebar( 'right' ); ?>

<?php get_footer(); ?>
