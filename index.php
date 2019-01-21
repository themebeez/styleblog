<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StyleBlog
 */

get_header(); ?>

<div class="container">
        <div class="row content-area">
            <?php
                $sidebar_position = styleblog_get_option( 'styleblog_sidebar_position' );
                if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) :
                    $class = 'col-md-12';
                else :
                    $class = 'col-lg-8 col-md-8 col-sm-12 col-xs-12 sticky_portion';
                endif;
                if( $sidebar_position == 'left' ) :
                    get_sidebar();
                endif;
            ?>
            <div class="<?php echo esc_attr( $class ); ?>">
                
                <?php
                    do_action( 'styleblog_featured_slider' );
                ?>
                
                <main id="main" class="site-main">
                	<?php
                		if( have_posts() ) :
                	?>
                	<div class="section_title">
                        <h3><?php esc_html_e( 'Recent Posts', 'styleblog' ); ?></h3>
                    </div>
                    <?php
                    	endif;

                    	/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						do_action( 'styleblog_pagination' );
                    ?>
                </main>
                <?php
                    do_action( 'styleblog_body_advertisement' );
                ?>
            </div>
            <?php
                if( $sidebar_position == 'right' ) :
                    get_sidebar();
                endif;
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
