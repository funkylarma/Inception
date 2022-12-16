<?php
/**
 * This file adds functions to the inception WordPress theme.
 *
 * @package Inception
 * @author  Adam Chamberlin
 * @link    https://adamchamberlin.info
 */

if ( ! function_exists( 'inception_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function inception_setup() {
		
		add_theme_support( 'wp-block-styles' );

		// Make theme available for translation.
		load_theme_textdomain( 'inception', get_template_directory() . '/languages' );

		// Enqueue editor styles and fonts.
		add_editor_style( array( './style.css' ) );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
		
		// Register the pattern categories
		register_block_pattern_category( 'call-to-action', array( 'label' => __( 'Call To Action', 'inception' ) ) );
		register_block_pattern_category( 'hero', array( 'label' => __( 'Hero', 'inception' ) ) );
		register_block_pattern_category( 'media', array( 'label' => __( 'Media', 'inception' ) ) );
		register_block_pattern_category( 'pricing', array( 'label' => __( 'Pricing', 'inception' ) ) );
		register_block_pattern_category( 'team', array( 'label' => __( 'Teams', 'inception' ) ) );
		register_block_pattern_category( 'testimonials', array( 'label' => __( 'Testimonials', 'inception' ) ) );

	}
}
add_action( 'after_setup_theme', 'inception_setup' );

/**
 * Enqueues the theme stylesheets
 *
 * @return void
 */
function inception_enqueue_style_sheet() {

	wp_enqueue_style( 'inception', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'inception_enqueue_style_sheet' );

/**
 * Register block styles.
 *
 * @since 0.9.2
 */
function inception_register_block_styles() {

	$block_styles = array(
		'core/button'          => array(
			'fill-base'    => __( 'Fill Base', 'inception' ),
			'outline-base' => __( 'Outline Base', 'inception' ),
		),
		'core/group'           => array(
			'full-height'  => __( 'Full-height', 'inception' ),
			'shadow'       => __( 'Shadow', 'inception' ),
			'shadow-solid' => __( 'Shadow Solid', 'inception' ),
		),
		'core/list'            => array(
			'no-disc' => __( 'No Disc', 'inception' ),
		),
		'core/navigation-link' => array(
			'outline' => __( 'Outline', 'inception' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style( $block, array( 'name'  => $style_name, 'label' => $style_label, ) );
		}
	}
}
add_action( 'init', 'inception_register_block_styles' );
