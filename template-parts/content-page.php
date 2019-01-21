<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StyleBlog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single_page_layout_one general_single_page_layout' ); ?>>
	<div class="post_desc_and_meta_holder">
		<?php
			if( has_post_thumbnail() ) :
		?>
				<div class="post_fimage">
		            <?php
		            	the_post_thumbnail( 'full' );
		            ?>
		        </div>
        <?php
        	endif;
        ?>
		<div class="post_title">
			<?php 
				the_title( '<h2>', '</h2>' ); 
			?>
		</div>
		<div class="the_content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'styleblog' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<?php 
			if ( get_edit_post_link() ) : 
		?>
				<div class="edit-post">
					<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'styleblog' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</div>
		<?php
			endif;
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->