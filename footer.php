<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StyleBlog
 */

?>
	<footer class="primary_footer">
		<?php
			$show_social_icons = styleblog_get_option( 'styleblog_enable_social_icons' );
			if( has_nav_menu( 'menu-2' ) && $show_social_icons ) :
				?>
			    <div class="top_footer">
			    	<?php
                        wp_nav_menu( array(
                            'theme_location'    => 'menu-2',
                            'menu_class'        => 'top_footer_social_links nav_social'
                        ) );            
                    ?>
			    </div>
			    <?php
	    	endif;
	    ?>
	    <!-- // top_footer -->
	    <div class="footer_inner">
	        <div class="footer-mask"></div>
	        <div class="container">
	            <div class="row">
	            	<?php
	            		if( is_active_sidebar( 'sidebar-2' ) ) :
	            			dynamic_sidebar( 'sidebar-2' );
	            		endif;
	            	?>
	            </div>
	            <!-- // footer row -->
	            <div class="row footer_bottom">
	            	<?php
	            		$copyright_text = styleblog_get_option( 'styleblog_copyright_text' );
	            		if( $copyright_text ) :
	            	?>
			                <div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="copyright_section">
			                        <div class="copyright_information">
			                            <p>
			                            	<?php
			                            		echo esc_html( $copyright_text );
			                            	?>
			                            </p>
			                        </div>
			                    </div>
			                </div>
	                <?php
	                	endif;
	                ?>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                	<div class="powered_section">
	                		<div class="site-info">
					            <?php 
					            	/* translators: theme credit info */
					            	printf( esc_html__( '%1$s by %2$s', 'styleblog' ), 'StyleBlog', '<a href="https://themebeez.com" rel="designer" target="_blank">Themebeez</a>' );
					            ?>
					        </div><!-- .site-info -->
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer>
	<?php
		$show_scroll_top = styleblog_get_option( 'styleblog_enable_scroll_top' );
		if( $show_scroll_top ) :
			?>
			<div class="back-to-top">
			    <a href="javascript:" id="return-to-top">
			    	<i class="fa fa-angle-up"></i>
			    </a>
			</div>
			<?php
		endif;
	?>

<?php wp_footer(); ?>

</body>
</html>
