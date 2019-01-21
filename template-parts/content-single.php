<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StyleBlog
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'single_page_layout_one general_single_page_layout' ); ?>>
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
		<div class="post_desc_and_meta_holder">
			<div class="post_meta">
				<?php
					styleblog_get_categories();

					styleblog_get_post_date();

					styleblog_get_comments_no();
				?>
			</div>
			<div class="post_title">
				<h2>
					<?php
						the_title();
					?>
				</h2>
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
				if( styleblog_get_tags() ) :
			?>
					<div class="extra_post_metas">
						<div class="post_tags">
							<strong>
								<?php  
									esc_html_e( 'Tags: ', 'styleblog' );
								?>
							</strong>
							<?php
								styleblog_get_tags();
							?>
						</div>
					</div>
			<?php
				endif;
			?>
		</div>
	</article>