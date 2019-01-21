<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();

$wp_customize->add_section( 'styleblog_footer_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Footer', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'	
) );

// Enable Social Icons
$wp_customize->add_setting('styleblog_enable_social_icons',array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults['styleblog_enable_social_icons'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'styleblog_enable_social_icons',array(
	'label' 	=> esc_html__('Show Social Icons','styleblog'),
	'section' 	=> 'styleblog_footer_options',
	'type'		=> 'checkbox',
)));

// Copyright Text
$wp_customize->add_setting( 'styleblog_copyright_text', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['styleblog_copyright_text'],
) );
$wp_customize->add_control( 'styleblog_copyright_text', array(
	'label'				=> esc_html__( 'Copyright Text', 'styleblog' ), 
	'section'			=> 'styleblog_footer_options',
	'type'				=> 'text' 
) );

// Enable Scroll Top Button
$wp_customize->add_setting('styleblog_enable_scroll_top',array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults['styleblog_enable_scroll_top'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'styleblog_enable_scroll_top',array(
	'label' 	=> esc_html__('Show Scroll Top Button','styleblog'),
	'section' 	=> 'styleblog_footer_options',
	'type'		=> 'checkbox',
)));