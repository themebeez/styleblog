<?php
/**
 * StyleBlog Theme Customizer
 *
 * @package StyleBlog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function styleblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Custom Control
	require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/customizer-controls.php'; 

	// Sanitization Callback
	require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/sanitize-callback.php'; 

	// Customization Options
	require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options.php';

	// Upspell
	require_once trailingslashit( get_template_directory() ) . '/themebeez/upgrade-to-pro/upgrade.php';

	$wp_customize->register_section_type( 'StyleBlog_Customize_Section_Upsell' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'styleblog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'styleblog_customize_partial_blogdescription',
		) );
	}

	// Register sections.
	$wp_customize->add_section(
		new StyleBlog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'StyleBlog Plus', 'styleblog' ),
				'pro_text' => esc_html__( 'Upgrade to Pro', 'styleblog' ),
				'pro_url'  => 'https://themebeez.com/themes/style-blog/',
				'priority' => 1,
			)
		)
	);
}
add_action( 'customize_register', 'styleblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function styleblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function styleblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function styleblog_customize_preview_js() {

	wp_enqueue_script( 'styleblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'styleblog_customize_preview_js' );

/**
 * Enqueue scripts for customizer
 */
function styleblog_customizer_js() {
	wp_enqueue_style( 'styleblog-upgrade', get_template_directory_uri() . '/themebeez/upgrade-to-pro/upgrade.css');

	wp_enqueue_script('styleblog-upgrade', get_template_directory_uri() . '/themebeez/upgrade-to-pro/upgrade.js', array('jquery'), '20151215', true);
}
add_action( 'customize_controls_enqueue_scripts', 'styleblog_customizer_js' );
