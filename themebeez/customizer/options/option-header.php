<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();

$wp_customize->add_section( 'styleblog_header_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Header', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'
) );

$wp_customize->add_setting( 'styleblog_enable_top_header', array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults[ 'styleblog_enable_top_header' ],
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'styleblog_enable_top_header', array(
	'label' 	=> esc_html__( 'Show Top Header', 'styleblog' ),
	'section' 	=> 'styleblog_header_option',
	'type'		=> 'checkbox',
) ) );