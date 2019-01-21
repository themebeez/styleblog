<?php
/**
 * Load hooks.
 *
 * @package StyleBlog
 */

/*======================================================
			Body Advertisement Hook
======================================================*/
if( ! function_exists( 'styleblog_body_advertisement_action' ) ) :
	/**
     * Body Advertisement Declaration
     *
     * @since 1.0.0
     */
	function styleblog_body_advertisement_action() {
		if( is_active_sidebar( 'sidebar-4' ) ) :
	?>
			<section class="third_advertisement_block">
				<?php
					dynamic_sidebar( 'sidebar-4' );
				?>
			</section>
	<?php	
		endif;	
	}
endif;
add_action( 'styleblog_body_advertisement', 'styleblog_body_advertisement_action', 10 );


/*======================================================
			Featured Slider Hook
======================================================*/
if( ! function_exists( 'styleblog_featured_slider_action' ) ) :
	/**
     * Featured Slider Declaration
     *
     * @since 1.0.0
     */
	function styleblog_featured_slider_action() {

		$enable_slider = styleblog_get_option( 'styleblog_enable_feat_slider' );

		$slider_post_cat = styleblog_get_option( 'styleblog_featured_post_cat' );
		$slider_post_no = styleblog_get_option( 'styleblog_featured_post_no' );

		$slider_args = array(
			'post_type'			=> 'post',
			'cat'				=> absint( $slider_post_cat ),
			'posts_per_page'	=> absint( $slider_post_no )
		);
		$slider_query = new WP_Query( $slider_args );

		if( $enable_slider == 1 && $slider_query->have_posts() ) :

	?>
		<section class="featured_posts">
			<div class="featured_posts_inner wow fadeInUp">
				<div class="swiper-container swiper-container-horizontal">
					<div class="swiper-wrapper">
						<?php
							while( $slider_query->have_posts() ) :
								$slider_query->the_post();
						?>
								<div class="swiper-slide">
									<?php
										if( has_post_thumbnail() ) :
									?>
											<div class="fp_featured_image">
												<?php
													the_post_thumbnail( 'styleblog-thumbnail-two', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
												?>
												<div class="mask"></div>
											</div>
									<?php
										else :
									?>
											<div class="fp_featured_image">
												<img src="<?php echo esc_url( get_template_directory_uri() . '/royalethemes/assets/img/no-image-slider.jpg' ); ?>">
												<div class="mask"></div>
											</div>
									<?php
										endif;
									?>
									<div class="fp_content_holder">
										<div class="fp_category">
											<?php
												/* translators: used between list items, there is a space after the comma */
												$categories_list = get_the_category_list( esc_html__( ' ', 'styleblog' ) );			
												if ( $categories_list ) {
													/* translators: 1: list of categories. */
													printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'styleblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
												}
											?>
										</div>
										<div class="fp_content">
											<h2>
												<?php 
													the_title();
												?>
											</h2>
											<div class="fp_the_permalink">
												<a href="<?php the_permalink() ?>">
													<span class="the_permalink_btn">
														<?php
															esc_html_e( 'Read More', 'styleblog' );
														?>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
						<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
				</div>
			</div>
		</section>
	<?php	
		endif;	
	}
endif;
add_action( 'styleblog_featured_slider', 'styleblog_featured_slider_action', 10 );


/*======================================================
				Breadcrumb Hook
======================================================*/
if( ! function_exists( 'styleblog_breadcrumb_action' ) ) :
	/**
     * Breadcrumb Declaration
     *
     * @since 1.0.0
     */
	function styleblog_breadcrumb_action() {
		$enable_breadcrumb = styleblog_get_option( 'styleblog_enable_breadcrumb' );
		if( $enable_breadcrumb ) :
			?>
		    <div class="breadcrumb clearfix">
				<?php
			        $breadcrumb_args = array(
			            'show_browse' => false,
			            'separator' => '&nbsp;',
			            'post_taxonomy' => array(
			                'post' => 'category'
			            )                        
			        );
			        styleblog_breadcrumb_trail( $breadcrumb_args );
			    ?>
			</div><!-- .breadcrumb.clearfix -->
			<?php		
		endif;
	}
endif;
add_action( 'styleblog_breadcrumb', 'styleblog_breadcrumb_action', 10 );


/*======================================================
				Pagination Hook
======================================================*/
if( ! function_exists( 'styleblog_pagination_action' ) ) :
	/**
     * Pagination Declaration
     *
     * @since 1.0.0
     */
	function styleblog_pagination_action() {
	?>
		<div class="pagination_wrapper">
			<?php
				the_posts_pagination( 
					array(
						'mid_size' 	=> 2,
						'prev_text' => __( '<i class="fa fa-reply"></i>', 'styleblog' ),
						'next_text' => __( '<i class="fa fa-share"></i>', 'styleblog' ),
					) 
				);
			?>
		</div>
	<?php		
	}
endif;
add_action( 'styleblog_pagination', 'styleblog_pagination_action', 10 );


/*======================================================
				Related Post Hook
======================================================*/
if( ! function_exists( 'styleblog_related_posts_action' ) ) :
	/**
     * Related Posts Declaration
     *
     * @since 1.0.0
     */
	function styleblog_related_posts_action() {

		$enable_related_posts = styleblog_get_option( 'styleblog_enable_related_posts' );

		$related_posts_no = styleblog_get_option( 'styleblog_related_posts_no' );

    	$qargs = array(
			'no_found_rows'       => true,
			'ignore_sticky_posts' => true,
			'posts_per_page'	  => absint( $related_posts_no ),
		);

		$current_object = get_queried_object();

		if ( $current_object instanceof WP_Post ) {
			$current_id = $current_object->ID;

			if ( absint( $current_id ) > 0 ) {
				// Exclude current post.
				$qargs['post__not_in'] = array( absint( $current_id ) );

				// Include current posts categories.
				$categories = wp_get_post_categories( $current_id );
				if ( ! empty( $categories ) ) {
					$qargs['tax_query'] = array(
						array(
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => $categories,
							'operator' => 'IN',
							)
						);
				}
			}
		}

		$related_posts = new WP_Query( $qargs );

		if( $related_posts->have_posts() && $enable_related_posts == 1 ) :
	?>
			<div class="related_posts">
				<div class="related_posts_title">
					<h3>Related Posts</h3>
					<div class="related_posts_contants">
						<div class="related_posts_carousel owl-carousel">
							<?php
								while( $related_posts->have_posts() ) :
									$related_posts->the_post();
							?>
									<div class="item">
										<div class="rp_post_card">
											<div class="rp_fimage">
												<?php
													if( has_post_thumbnail() ) :
														the_post_thumbnail( 'styleblog-thumbnail-one' );
													endif;
												?>
												<div class="mask-moderate"></div>
												<div class="rp_title">
													<h4>
														<a href="<?php the_permalink(); ?>">
															<?php
																the_title();
															?>
														</a>
													</h4>
												</div>
											</div>
										</div>
									</div>
							<?php
								endwhile;
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		
	<?php	
		endif;	
	}
endif;
add_action( 'styleblog_related_posts', 'styleblog_related_posts_action', 10 );