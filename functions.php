<?php
/**
 * @package    DancingInTheMoonlight
 * @version    1.0.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/themes/dancing-in-the-moonlight
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'dancing_moonlight_theme_setup' );

/**
 * Theme setup function.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function dancing_moonlight_theme_setup() {

	/* Add custom background. */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'd9eeee',
			'default-image' => '',
		)
	);

	/* Add custom header. */
	add_theme_support( 
		'custom-header', 
		array(
			'default-text-color' => '0c233c',
			'default-image'      => '%2$s/images/headers/santa-moon.png',
			'random-default'     => false,
		)
	);

	/* Register default headers. */
	register_default_headers(
		array(
			'santa-moon' => array(
				'url'           => '%2$s/images/headers/santa-moon.png',
				'thumbnail_url' => '%2$s/images/headers/santa-moon-thumb.png',
				/* Translators: Header image description. */
				'description'   => __( 'Santa and the Moon', 'dancing-in-the-moonlight' )
			),
		)
	);

	/* Custom editor stylesheet. */
	add_editor_style( '//fonts.googleapis.com/css?family=Bangers' );

	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'dancing_moonlight_color_primary' );

	/* Load stylesheets. */
	add_action( 'wp_enqueue_scripts', 'dancing_moonlight_enqueue_styles', 0 );
}

/**
 * Loads custom stylesheets for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function dancing_moonlight_enqueue_styles() {
	wp_enqueue_style( 'dancing-moonlight-fonts', '//fonts.googleapis.com/css?family=Bangers' );
}

/**
 * Add a default custom color for the theme's "primary" color option.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function dancing_moonlight_color_primary( $hex ) {
	return $hex ? $hex : '0b4f8f';
}
