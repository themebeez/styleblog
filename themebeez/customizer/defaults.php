<?php
/**
 * Default Options.
 *
 * @package StyleBlog
 */

if ( ! function_exists( 'styleblog_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function styleblog_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = styleblog_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'styleblog_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function styleblog_get_default_theme_options() {

		$defaults = array();

		// Top Header
		$defaults['styleblog_enable_top_header']		= 1;

		// BreadCrumb 
		$defaults['styleblog_enable_breadcrumb']		= 1;

		// Footer
		$defaults['styleblog_copyright_text']			= '&copy; Copyright 2018. All Rights Reserved.';
		$defaults['styleblog_enable_scroll_top']		= 1;
		$defaults['styleblog_enable_social_icons']		= 1;

		// Featured Posts In Blog Page
		$defaults['styleblog_enable_feat_slider']		= 0;
		$defaults['styleblog_featured_post_cat']		= 0;
		$defaults['styleblog_featured_post_no']			= 3;	
		$defaults['styleblog_post_cat_in_blog']			= 1;	

		// Social Links
		$defaults['styleblog_facebook_link']			= '';	
		$defaults['styleblog_twitter_link']				= '';	
		$defaults['styleblog_instagram_link']			= '';	
		$defaults['styleblog_snapchat_link']			= '';	
		$defaults['styleblog_pinterest_link']			= '';	
		$defaults['styleblog_vk_link']					= '';	
		$defaults['styleblog_vimeo_link']				= '';	
		$defaults['styleblog_medium_link']				= '';	
		$defaults['styleblog_googleplus_link']			= '';	
		$defaults['styleblog_quora_link']				= '';	
		$defaults['styleblog_youtube_link']				= '';	
		$defaults['styleblog_linkedin_link']			= '';	

		// Single Post
		$defaults['styleblog_enable_related_posts']		= 1;
		$defaults['styleblog_related_posts_no']			= 5;

		// Others
		$defaults['styleblog_sidebar_position']			= 'right';
		$defaults['styleblog_excerpt_length']			= 15;

		return $defaults;
	}

endif;
