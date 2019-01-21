<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package StyleBlog_Plus
 */

get_header(); ?>

	<div class="container">
		<?php
	        do_action( 'styleblog_breadcrumb' );
	    ?>

		<div class="single_page_wrapper">
		    <div class="single_page_inner">
		        <div class="error_page_content">
		            <div class="error">
		                <div class="error-frame">
		                    <div class="error-code">
		                    	<h2>
		                    		<?php esc_html_e( '404','styleblog' ); ?>
		                    	</h2>
		                    </div>
		                    <div class="error-message">
		                    	<p>
		                    		<?php esc_html_e( 'Page not found','styleblog' ); ?>
		                    	</p>
		                    	<p><?php esc_html_e( 'Page you are looking for either has moved or doesnt exists in this server.','styleblog' ); ?></p>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

<?php
get_footer();
