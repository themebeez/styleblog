<?php
/**
 * Theme Tags Options.
 *
 * @package StyleBlog
 */

if( !function_exists( 'styleblog_get_categories' ) ) :
	/**
	 * Function To Get Categories
	 */
	function styleblog_get_categories() {
		if( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'styleblog' ) );			
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'styleblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if( !function_exists( 'styleblog_get_tags' ) ) :
	/**
	 * Function To Get Tags
	 */
	function styleblog_get_tags() {
		if( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'styleblog' ) );
			if( $tags_list ) :
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( ' %1$s', 'styleblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			endif;
		}
	}
endif;

if( !function_exists( 'styleblog_get_comments_no' ) ) :
	/**
	 * Function To Get Tags
	 */
	function styleblog_get_comments_no() {
		if( ( comments_open() || get_comments_number() ) ) {
			$comments_number = get_comments_number();
			if( $comments_number == 0 ) {
				echo '<span class="post-comment">' . esc_html__( 'No Comment', 'styleblog' ) . '</span>';
			} else if( $comments_number == 1 ) {
				/* translators: %s: number of comments. */
				printf( '<span class="post-comment">' . esc_html_x( '%s Comment', 'comments-no', 'styleblog' ) . '</span>' , $comments_number );
			} else {
				/* translators: %s: number of comments. */
				printf( '<span class="post-comment">' . esc_html_x( '%s Comment', 'comments-no', 'styleblog' ) . '</span>' , $comments_number );
			}
		}
	}
endif;

if( !function_exists( 'styleblog_get_author' ) ) :
	/**
	 * Function To Get Author
	 */
	function styleblog_get_author() {
		printf( '<span class="post-author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" >' . esc_html( get_the_author() ) . '</a></span>' );
	}
endif;

if( !function_exists( 'styleblog_get_post_date' ) ) :
	/**
	 * Function To Get Post Date
	 */
	function styleblog_get_post_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
	}
endif;
