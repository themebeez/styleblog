<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();

$wp_customize->add_section( 'styleblog_other_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Others', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'
) );

// Setting global_layout.
$wp_customize->add_setting( 'styleblog_sidebar_position', array(
	'default'           => $defaults['styleblog_sidebar_position'],
	'sanitize_callback' => 'styleblog_sanitize_select',
) );
$wp_customize->add_control( 'styleblog_sidebar_position', array(
	'label'    => esc_html__( 'Sidebar Position', 'styleblog' ),
	'section'  => 'styleblog_other_options',
	'type'     => 'radio',
	'choices'  => array(
		'left'  => esc_html__( 'Left Sidebar', 'styleblog' ),
		'right' => esc_html__( 'Right Sidebar', 'styleblog' ),
		'none'    => esc_html__( 'No Sidebar', 'styleblog' ),
	),
) );

$wp_customize->add_setting( 'styleblog_excerpt_length', array(
	'default' 			=> $defaults['styleblog_excerpt_length'],		
	'sanitize_callback' => 'styleblog_sanitize_number'
) );

$wp_customize->add_control( 'styleblog_excerpt_length', array(		
	'label' 		=> esc_html__('Excerpt Length', 'styleblog'),
	'description' 	=> esc_html__( 'Select number of words to display in excerpt', 'styleblog' ),
	'section' 		=> 'styleblog_other_options',
	'type'      	=> 'number'		
) );