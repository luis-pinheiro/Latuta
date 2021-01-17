<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Components_Business
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="page-footer content-info container-fluid grey darken-3" role="contentinfo">
		  <div class="row ">
	            <div class="col-xs-12 col-sm-12 col-lg-4 center">
	                <?php dynamic_sidebar('nav_footer_links'); ?>
	            </div>
	            <div class="col-xs-12 col-sm-12 col-lg-4 center ">
	                <?php dynamic_sidebar('nav_footer_middle'); ?>
	            </div>
	            <div class="col-xs-12 col-sm-12 col-lg-4 center">
	               <?php dynamic_sidebar('nav_footer_rechts'); ?>
	            </div>
	        </div>

	        <div class="footer-copyright grey darken-4 z-depth-1">
				<?php get_template_part( 'components/site-info/site-info' ); ?>
	        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
