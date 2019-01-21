<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$defaults = styleblog_get_default_theme_options();

$wp_customize->add_section( 'styleblog_single_post_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Post Page', 'styleblog' ),
	'panel'			=> 'styleblog_theme_options'
) );

// Enable Related Posts
$wp_customize->add_setting( 'styleblog_enable_related_posts', array(
	'sanitize_callback' => 'styleblog_sanitize_checkbox',
	'default' 			=> $defaults[ 'styleblog_enable_related_posts' ],
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'styleblog_enable_related_posts', array(
	'label' 	=> esc_html__( 'Show Related Posts', 'styleblog' ),
	'section' 	=> 'styleblog_single_post_options',
	'type'		=> 'checkbox',
) ) );

// Related Posts' Number
$wp_customize->add_setting('styleblog_related_posts_no',array(
	'sanitize_callback' => 'styleblog_sanitize_number',
	'default' 			=>  $defaults['styleblog_related_posts_no'],
) );

$wp_customize->add_control( 'styleblog_related_posts_no', array(
	'label' 			=> esc_html__('Numbers of Related Posts','styleblog'),
	'description' 		=> esc_html__('Default number is 5. Minimum no is 3 and maximum is 10.','styleblog'),
	'section' 			=> 'styleblog_single_post_options',
	'type'				=> 'number',
	'input_attrs'   	=> array( 'min' => 3, 'max' => 10, 'step'  => 1 ),
	'active_callback' 	=> 'styleblog_is_active_feat_slider'
) );