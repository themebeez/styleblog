<?php
/**
 * Custom widgets.
 *
 * @package StyleBlog
 */


if ( ! class_exists( 'StyleBlog_Author_Widget' ) ) :

	/**
	 * Author widget class.
	 *
	 * @since 1.0.0
	 */
	class StyleBlog_Author_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => '',
				'description' => esc_html__( 'Displays Author\'s Information. Place it in sidebar.', 'styleblog' ),
    		);

			parent::__construct( 'styleblog-auth-widget', esc_html__( 'SB-Sidebar: Author Info', 'styleblog' ), $opts );
	    }


	    function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            $page_id    = !empty( $instance['page'] ) ? $instance['page'] : '';
            $facebook       = !empty( $instance['facebook'] ) ? $instance['facebook'] : '';
            $twitter        = !empty( $instance['twitter'] ) ? $instance['twitter'] : '';
            $google_plus    = !empty( $instance['google_plus'] ) ? $instance['google_plus'] : '';
            $instagram      = !empty( $instance['instagram'] ) ? $instance['instagram'] : '';
            $pinterest      = !empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $snapchat       = !empty( $instance['snapchat'] ) ? $instance['snapchat'] : '';
            $vk             = !empty( $instance['vk'] ) ? $instance['vk'] : '';
            $youtube        = !empty( $instance['youtube'] ) ? $instance['youtube'] : '';
            $linkedin       = !empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';

            $auth_args = array(
                'post_type'             => 'page',
                'page_id'               => absint( $page_id ),
                'posts_per_page'        => 1,
                'ignore_sticky_posts'   => true
            );

            echo $args['before_widget'];
            if( !empty( $title ) ) :
                echo $args['before_title'];
                echo esc_html( $title );
                echo $args['after_title'];
            endif;

            $auth_query = new WP_Query( $auth_args );
            if( $auth_query->have_posts() ) :
                while( $auth_query->have_posts() ) :
                    $auth_query->the_post();
            ?>
            		<div class="widget_content">
            			<?php
            				if( has_post_thumbnail() ) :
            			?>
		                        <div class="widget_author_fimage">
			                        <?php
			                        	the_post_thumbnail( 'styleblog-thumbnail-three' );
			                        ?>
		                        </div>
                        <?php
                         endif;
                        ?>
                        <div class="widget_author_bio">
                            <div class="author_name">
                                <h4>
                                   	<?php
                                   		the_title();
                                   	?>
                                </h4> 
                            </div>
                            <div class="author_desc">
                                <?php
                                   	the_content();
                                ?>
                            </div>
                        </div>

                        <div class="widget_author_social">
                            <ul class="nav_social">
                            	<?php
                            		if( $facebook ) {
                            	?>
                                		<li>
                                			<a href="<?php echo esc_url( $facebook ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $twitter ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $twitter ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $instagram ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $instagram ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $pinterest ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $youtube ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $youtube ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $snapchat ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $snapchat ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $google_plus ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $google_plus ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $vk ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $vk ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                	if( $linkedin ) {
                                ?>
                                		<li>
                                			<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"></a>
                                		</li>
                                <?php
                                	}
                                ?>
                            </ul>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;

            echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;

            $instance[ 'title' ]    	= sanitize_text_field( $new_instance[ 'title' ] );
            $instance[ 'page' ] 		= absint( $new_instance[ 'page' ] );
            $instance[ 'facebook' ]     = esc_url_raw( $new_instance[ 'facebook' ] );
            $instance[ 'twitter' ]      = esc_url_raw( $new_instance[ 'twitter' ] );
            $instance[ 'google_plus' ]  = esc_url_raw( $new_instance[ 'google_plus' ] );
            $instance[ 'instagram' ]    = esc_url_raw( $new_instance[ 'instagram' ] );
            $instance[ 'pinterest' ]    = esc_url_raw( $new_instance[ 'pinterest' ] );
            $instance[ 'snapchat' ]     = esc_url_raw( $new_instance[ 'snapchat' ] );
            $instance[ 'vk' ]           = esc_url_raw( $new_instance[ 'vk' ] );
            $instance[ 'youtube' ]      = esc_url_raw( $new_instance[ 'youtube' ] );
            $instance[ 'linkedin' ]     = esc_url_raw( $new_instance[ 'linkedin' ] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
                'title'         => '',
                'page'          => '',
                'facebook'      => '',
                'twitter'       => '',
                'google_plus'   => '',
                'instagram'     => '',
                'pinterest'     => '',
                'snapchat'      => '',
                'vk'            => '',
                'youtube'       => '',
                'linkedin'      => '',
	        ) );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title: ', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "title" ) ) ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>">
                    <strong><?php esc_html_e( 'Page:', 'styleblog' ); ?></strong>
                </label>
                <?php
                    wp_dropdown_pages( array(
                            'id'               => esc_attr( $this->get_field_id( "page" ) ),
                            'class'            => 'widefat',
                            'name'             => esc_attr( $this->get_field_name( "page" ) ),
                            'selected'         => esc_attr( $instance["page"] ),
                            'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'styleblog' ),
                        )
                    );
                ?>
            </p>  

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                    <strong><?php esc_html_e( 'Facebook Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                    <strong><?php esc_html_e( 'Twitter Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>">
                    <strong><?php esc_html_e( 'Google Plus Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google_plus' ) ); ?>" value="<?php echo esc_attr( $instance['google_plus'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                    <strong><?php esc_html_e( 'Instagram Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                    <strong><?php esc_html_e( 'Pinterest Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>">
                    <strong><?php esc_html_e( 'Snapchat Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'snapchat' ) ); ?>" value="<?php echo esc_attr( $instance['snapchat'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>">
                    <strong><?php esc_html_e( 'VK Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" value="<?php echo esc_attr( $instance['vk'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                    <strong><?php esc_html_e( 'Youtube Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>">
                    <strong><?php esc_html_e( 'Linkedin Link:', 'styleblog' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>">
            </p>             
	        <?php
        }

	}

endif;