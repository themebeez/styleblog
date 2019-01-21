<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StyleBlog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content">
        <?php 
            esc_html_e( 'Skip to content', 'styleblog' ); 
        ?>
    </a>
    <?php
        if( has_header_image() ) :
    ?>
            <div class="container" style="background-image: url(<?php esc_url( header_image() ); ?>);background-size: cover; background-position: center;">
    <?php
        else :
    ?>
	       <div class="container">
    <?php
        endif;
            $show_top_header = styleblog_get_option( 'styleblog_enable_top_header' );
            if( $show_top_header && ( has_nav_menu( 'menu-3' ) || has_nav_menu( 'menu-2' ) ) ) :
                ?>
                <div class="header_top_wrapper">
                    <div class="row">
                        <?php 
                            if( has_nav_menu( 'menu-3' ) ) : 
                                ?>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="header_top_left">
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location'    => 'menu-3',
                                            ) );
                                        ?>
                                     </div><!-- // header_top_left -->
                                 </div>
                                <?php 
                            endif; 

                            if( has_nav_menu( 'menu-2' ) ) :
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="social_nav_inner">
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location'    => 'menu-2',
                                                'menu_class'        => 'nav_social'
                                            ) );            
                                        ?>
                                    </div>
                                </div>
                                <?php
                            endif;
                        ?>
                    </div>
                </div>
                <?php
            endif;
        ?>
        <div class="logo-ad-wrapper">
            <div class="row clearfix">
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <?php
                        if( has_custom_logo() ) :
                    ?>
                        <div class="site-branding">
                            <div class="site-logo">
                                <?php
                                    the_custom_logo();
                                ?>
                            </div>
                        </div>
                    <?php
                        else : 
                    ?>
                            <div class="site-branding">
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <?php bloginfo( 'name' ); ?>
                                    </a>
                                </h1>
                                <?php
                                    $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) :
                                ?>
                                <h5 class="site-description">
                                    <?php
                                        echo esc_html( $description );
                                    ?>
                                </h5>
                                <?php
                                    endif;
                                ?>
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
                <?php
                    if( is_active_sidebar( 'sidebar-3' ) ) :
                ?>
                        <div class="col-md-8 col-sm-7 hidden-xs">
                            <?php
                                dynamic_sidebar( 'sidebar-3' );
                            ?>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <div class="navigation-wrapper">
            <div class="navigation-inner clearfix">
                <div class="attr-nav hidden-xs">
                    <ul>
                        <li><a href="#" class="search-button"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <div class="menu-container clearfix">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'    => 'menu-1',
                                    'menu_id'           => '',
                                    'menu_class'        => 'primary_navigation',
                                    'container'         => '',
                                    'container_class'   => '',
                                    'fallback_cb'       => 'styleblog_navigation_fallback',
                                )
                            );
                        ?>
						
						<?php //do_shortcode('[maxmegamenu location=menu-1]'); ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .menu-container.clearfix -->
            </div>
        </div>
        <div class="search-container">
            <div class="top-search">
                <div class="container">
                    <div class="row">
                        <div class="search-form-container">
                            <?php
                                get_search_form();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
