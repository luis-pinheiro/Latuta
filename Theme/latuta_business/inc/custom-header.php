<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Components_Business
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses components_business_header_style()
 */
function components_business_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'components_business_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1350,
		'height'                 => 350,
		'flex-height'            => true,
		'wp-head-callback'       => 'components_business_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'components_business_custom_header_setup' );

if ( ! function_exists( 'components_business_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see components_business_custom_header_setup().
 */
function components_business_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title,
		a.site-title,
		.site-description,
		.site-title a:visited, 
		.site-title a:focus, 
		.site-title a:hover,
		#masthead > div > div > h1 {
			color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // components_business_header_style
