<?php
/**
 * Helper Functions.
 *
 * @package StyleBlog
 */

/**
 * Filter to alter excerpt more text
 */
if( !function_exists( 'styleblog_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function styleblog_excerpt_more( $more ) {
		if( is_admin() ) {
			return $more;
		}
		
		return '';
	}
endif;
add_filter( 'excerpt_more', 'styleblog_excerpt_more' );

/**
 * Filter to limit excerpt length
 */
if( !function_exists( 'styleblog_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function styleblog_excerpt_length( $length ) {
		
		if( is_admin() ) {
			return $length;
		}

		$excerpt_length = styleblog_get_option( 'styleblog_excerpt_length' );

		$excerpt_length = apply_filters( 'styleblog_filter_excerpt_length', $excerpt_length );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;
	}
endif;
add_filter( 'excerpt_length', 'styleblog_excerpt_length' );


/**
 * Filter to exclude slider category from blog page
 */
if( !function_exists( 'styleblog_exclude_category' ) ) :
	/*
	 * Exclude Categories From Blog Page
	 */
	function styleblog_exclude_category( $query ) {
		$cat_id = styleblog_get_option( 'styleblog_featured_post_cat' );
		$show_cat = styleblog_get_option( 'styleblog_post_cat_in_blog' );
		$exclude_cat = explode( ', ', $cat_id );
		if( $show_cat ) {
			if ( $query->is_home() && $query->is_main_query() && !empty( $exclude_cat ) ) {
				$query->set( 'category__not_in', $exclude_cat );
			}
		}
	}
endif;
add_action( 'pre_get_posts', 'styleblog_exclude_category' );