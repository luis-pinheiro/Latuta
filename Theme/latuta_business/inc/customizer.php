<?php
/**
 * Components Business Theme Customizer
 *
 * @package Components_Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function components_business_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'components_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function components_business_customize_preview_js() {
	wp_enqueue_script( 'components_business_customizer', get_template_directory_uri() . '/assets/js/customizer.js', ['jquery'], null, true );
	wp_enqueue_script( 'components_business_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'jquery' ), '20130508', true );
}
add_action( 'customize_preview_init', 'components_business_customize_preview_js' );
