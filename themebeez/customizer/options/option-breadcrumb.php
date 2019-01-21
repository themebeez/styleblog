<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();


$wp_customize->add_section( 'styleblog_breadcrumb_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Breadcrumb', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'
) );

$wp_customize->add_setting( 'styleblog_enable_breadcrumb', array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' => $defaults[ 'styleblog_enable_breadcrumb' ],
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'styleblog_enable_breadcrumb', array(
	'label' => esc_html__( 'Show Breadcrumb', 'styleblog' ),
	'section' => 'styleblog_breadcrumb_option',
	'type'=> 'checkbox',
) ) );