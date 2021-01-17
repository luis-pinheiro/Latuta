<?php
/**
 * The template used for displaying hero content.
 *
 * @package Components_Business
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="latuta-business-hero">
		<?php the_post_thumbnail( 'latuta-business-hero' ); ?>
	</div><!-- .hero -->
<?php endif; ?>
