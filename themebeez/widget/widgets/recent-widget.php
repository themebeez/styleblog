<?php
/**
 * Popular Posts Widget.
 *
 * @package StyleBlog
 */

if ( ! class_exists( 'StyleBlog_Recent_Posts_Widget' ) ) :
	/**
	* Popular Posts Widget
	*/
	class StyleBlog_Recent_Posts_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'recent-posts-widget',
				'description'	=> esc_html__( 'Displays recent posts based on views. Place it in "Sidebar Or Footer"', 'styleblog' )
			);

			parent::__construct( 'styleblog-recent-widget', esc_html__( 'SB: Recent Posts', 'styleblog' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$cat = !empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;

			$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
						echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

			$recent_args = array(
				'cat'	=> absint( $cat ),
				'order' => 'DESC',
				'posts_per_page' => absint( $posts_no ),
				'post_type' => 'post'
			);

			$recent_query = new WP_Query( $recent_args );
			if( $recent_query->have_posts() ) :
			?>
				<div class="posts-container">
					<div class="row clearfix">
						<?php
							while( $recent_query->have_posts() ) :
								$recent_query->the_post();
								?>
								<div class="col-sm-12 post-layout-one">
									<div class="post-image-container">
										<a href="<?php the_permalink(); ?>">
											<?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail('styleblog-thumbnail-three');
												endif;
											?>
										</a>
									</div>
									<div class="post-detail-container">
										<h5>
											<a href="<?php the_permalink(); ?>">
												<?php
													the_title();
												?>
											</a>
										</h5>
										<?php
											styleblog_get_post_date();
										?>
									</div>
								</div>
								<div class="clearfix"></div>
								<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div>
				</div>
			<?php
			endif;
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['cat']		= absint( $new_instance['cat'] );

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'cat'		  => 0,
                'post_no'	  => 5,
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'styleblog'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

            <p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'styleblog' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'styleblog' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Recent Posts', 'styleblog'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;