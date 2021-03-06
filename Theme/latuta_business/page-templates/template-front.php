<?php
/**
 * Template Name: Front Page
 *
 * @package Components_Business
 */
get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part( 'components/content', 'hero' ); ?>
			<?php get_template_part( 'components/testimonials' ); ?>
		</main>
	</div>

<?php get_footer(); ?>
