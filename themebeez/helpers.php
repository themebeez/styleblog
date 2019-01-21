<?php
/**
 * Helper Functions.
 *
 * @package StyleBlog
 */


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'styleblog_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function styleblog_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Spectral SC font: on or off', 'styleblog')) {
            $fonts[] = 'Spectral+SC:300,400,400i,500,600,700';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */

        if ('off' !== _x('on', 'Poppins font: on or off', 'styleblog')) {
            $fonts[] = 'Poppins:400,400i,500,500i,700,700i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

if ( ! function_exists( 'styleblog_navigation_fallback' ) ) :
    /**
     * Fallback for primary navigation.
     *
     * @since 1.0.0
     */
    function styleblog_navigation_fallback() {
        ?>
        <ul id="menu-main-menu" class="main_navigation">
            <?php 
                wp_list_pages( array( 
                    'title_li' => '',
                    'depth'    => 1,
                    'number'   => 5,
                ) ); 
            ?>
        </ul>
        <?php
    }
endif;


/*
 * Hook - Plugin Recommendation
 */
if ( ! function_exists( 'styleblog_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function styleblog_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Themebeez Toolkit', 'styleblog' ),
                'slug'     => 'themebeez-toolkit',
                'required' => false,
            ),
        );

        tgmpa( $plugins );
    }

endif;
add_action( 'tgmpa_register', 'styleblog_recommended_plugins' );