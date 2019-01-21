<?php
/**
 * Customizer Options
 *
 * @package StyleBlog
 */

$wp_customize->add_panel( 'styleblog_theme_options', array(
	'title'			=> esc_html__( 'Theme Options', 'styleblog' ),
	'priority'		=> 10	
) );

// Header
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-header.php';

// Breadcrumb
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-breadcrumb.php';

// Featured Slider
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-featslider.php';

// Single Post Page
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-single.php';

// Footer
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-footer.php';

// Others
require_once trailingslashit( get_template_directory() ) . '/themebeez/customizer/options/option-others.php';