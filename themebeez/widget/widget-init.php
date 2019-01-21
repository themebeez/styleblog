<?php
/**
 * Custom widgets.
 *
 * @package StyleBlog
 */

// Load Widget Class
require_once trailingslashit( get_template_directory() ) . '/themebeez/widget/widgets/author-widget.php';
require_once trailingslashit( get_template_directory() ) . '/themebeez/widget/widgets/recent-widget.php';
require_once trailingslashit( get_template_directory() ) . '/themebeez/widget/widgets/comment-widget.php';

if ( ! function_exists( 'styleblog_load_home_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function styleblog_load_home_widgets() {

        // Author Widget.
        register_widget( 'StyleBlog_Author_Widget' );

        // Recent Posts Widget
        register_widget( 'StyleBlog_Recent_Posts_Widget' );

        // Recent Comments Widget
        register_widget( 'StyleBlog_Recent_Comments_Widget' );

    }

endif;

add_action( 'widgets_init', 'styleblog_load_home_widgets' );