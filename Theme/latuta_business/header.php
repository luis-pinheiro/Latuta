<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Components_Business
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( 'components/fixed-top-navigation/fixed-top-navigation' ); ?>
<div id="page" class="hfeed">
	<?php if ( get_header_image() ) : ?>
	<header id="masthead" class="site-header" role="banner" style="
		background-image: url(<?php header_image(); ?>);
		width: 100%;
		height: 350px;
		background-position: center center;
		background-repeat: no-repeat;
		/*background-attachment: fixed;*/
		background-size: cover;
		alt="">

		<?php else : ?>

		<header id="masthead" class="site-header" role="banner">

		<?php endif; ?>


		<div class="valign-wrapper">
			<?php get_template_part( 'components/branding/branding' ); ?>
		</div>





	</header><!-- #masthead -->

	<div id="content" class="site-content">
