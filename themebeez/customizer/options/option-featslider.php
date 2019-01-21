<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();

$wp_customize->add_section( 'styleblog_feat_slider_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Featured Slider', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'
) );

// Enable Featured Slider
$wp_customize->add_setting( 'styleblog_enable_feat_slider', array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults[ 'styleblog_enable_feat_slider' ],
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'styleblog_enable_feat_slider', array(
	'label' 	=> esc_html__( 'Show Featured Slider', 'styleblog' ),
	'section' 	=> 'styleblog_feat_slider_options',
	'type'		=> 'checkbox',
) ) );

// Featured Posts' Category
$wp_customize->add_setting('styleblog_featured_post_cat',array(
	'sanitize_callback' => 'styleblog_sanitize_number',
	'default' 			=>  $defaults['styleblog_featured_post_cat'],
) );

$wp_customize->add_control(	new StyleBlog_Dropdown_Taxonomies_Control( $wp_customize, 'styleblog_featured_post_cat', array(
	'label' 			=> esc_html__('Select Featured Posts Category','styleblog'),
	'section' 			=> 'styleblog_feat_slider_options',
	'type'				=> 'dropdown-taxonomies',
	'active_callback' 	=> 'styleblog_is_active_feat_slider'
) ) );

// Featured Posts' Number
$wp_customize->add_setting('styleblog_featured_post_no',array(
	'sanitize_callback' => 'styleblog_sanitize_number',
	'default' 			=>  $defaults['styleblog_featured_post_no'],
) );

$wp_customize->add_control( 'styleblog_featured_post_no', array(
	'label' 			=> esc_html__('Numbers of Featured Posts','styleblog'),
	'description' 		=> esc_html__('Default no is 3. Minimum no is 1 and maximum no is 5.','styleblog'),
	'section' 			=> 'styleblog_feat_slider_options',
	'type'				=> 'number',
	'input_attrs'   	=> array( 'min' => 1, 'max' => 5, 'step'  => 1 ),
	'active_callback' 	=> 'styleblog_is_active_feat_slider'
) );

// Enable Featured Slider
$wp_customize->add_setting( 'styleblog_post_cat_in_blog', array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults[ 'styleblog_post_cat_in_blog' ],
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'styleblog_post_cat_in_blog', array(
	'label' 			=> esc_html__( 'Display The Selected Category Only In Slider', 'styleblog' ),
	'section' 			=> 'styleblog_feat_slider_options',
	'type'				=> 'checkbox',
	'active_callback' 	=> 'styleblog_is_active_feat_slider'
) ) );