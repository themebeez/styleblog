<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StyleBlog
 */

get_header(); ?>
	<div class="container">
		<?php
	        do_action( 'styleblog_breadcrumb' );
	    ?>

	    <div class="single_page_wrapper">
	        <div class="single_page_inner">
	            <div class="single_post_page_conent_holder">
	                <div class="row">
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
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content', 'single' );

									the_post_navigation();

									do_action( 'styleblog_related_posts' );
									
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
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
	    </div>
	</div>

<?php
get_footer();
