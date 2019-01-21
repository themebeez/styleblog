<?php
/**
 * Popular Posts Widget.
 *
 * @package StyleBlog
 */

if ( ! class_exists( 'StyleBlog_Recent_Comments_Widget' ) ) :
	/**
	* Popular Posts Widget
	*/
	class StyleBlog_Recent_Comments_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'recent-comments-widget',
				'description'	=> esc_html__( 'Displays posts with recent comments. Place it in "Sidebar Or Footer"', 'styleblog' )
			);

			parent::__construct( 'styleblog-comment-widget', esc_html__( 'SB: Recent Comments', 'styleblog' ), $opts );
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

			$comment_args = array (
				'status' => 'approve',
				'number' => '5'
			);
			$comment_query = get_comments( $comment_args );

			if( !empty( $comment_query ) ) :
			?>
				<div class="posts-container">
					<div class="row clearfix">
						<?php
							foreach( $comment_query as $comment ) {
								$post_id = $comment->comment_post_ID;
								$post_query = new WP_Query( array(
									'p'	=> absint( $post_id ),
								) );

								if( $post_query->have_posts() ) :
									while( $post_query->have_posts() ) :
										$post_query->the_post(); 
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
												<div class="commentor">
													<span class="comment-by">
														<?php
															esc_html_e( 'By', 'styleblog' );
														?>
													</span>
													<span class="comment-author">
														<a href="<?php the_permalink(); ?>">
															<?php
																echo esc_html( $comment->comment_author );
															?>
														</a>
													</span>
													<span class="comment-on">
														<?php
															esc_html_e( 'On', 'styleblog' );
														?>
													</span>
												</div>
												<h5>
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h5>												
											</div>
										</div>
										<div class="clearfix"></div>
										<?php
									endwhile;
									wp_reset_postdata();
								endif;
							}
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

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
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
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Posts', 'styleblog'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;