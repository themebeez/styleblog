<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		        <div class="search_page_content_holder">
		            <div class="search_page_content_inner">
		            	<?php
		            		if( have_posts() ) :
		            	?>
				                <div class="page_title">
				                    <h3>
				                    	<?php
											/* translators: %s: search query. */
											printf( esc_html__( 'Search Results for: %s', 'styleblog' ), '<span>' . get_search_query() . '</span>' );
										?>
				                    </h3>
				                </div>
		                <?php
		                	endif;
		                ?>
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
				                <section class="recent_posts">
				                	<?php
				                		if( have_posts() ) :

					                		/* Start the Loop */
											while ( have_posts() ) : the_post();

												/**
												 * Run the loop for the search to output the results.
												 * If you want to overload this in a child theme then include a file
												 * called content-search.php and that will be used instead.
												 */
												get_template_part( 'template-parts/content', 'search' );

											endwhile;

											do_action( 'styleblog_pagination' );
										else :

											get_template_part( 'template-parts/content', 'none' );

										endif;
				                	?>
				                </section>

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
		</div>
	</div>
</div>

<?php
get_footer();
