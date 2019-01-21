<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StyleBlog
 */

?>
	<article id="post-<?php the_ID(); ?>" class="recent_posts_inner wow fadeInUp">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<?php
					if( has_post_thumbnail() ) :
				?>
						<div class="recent_post_fimage">
							<a href="<?php the_permalink(); ?>">
								<?php
									the_post_thumbnail( 'styleblog-thumbnail-one', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
								?>
							</a>
						</div>
				<?php
					else :
				?>
						<div class="recent_post_fimage">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/themebeez/assets/img/no-image-archive.png' ); ?>">
							</a>
						</div>
				<?php
					endif;
				?>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="recent_post_content">
					<div class="post_details_holder">
						<div class="the_title">
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
						</div>
						<div class="the_content">
							<?php the_excerpt(); ?>
						</div>
						<?php
							if( get_post_type() == 'post' ) :
						?>
								<div class="post_meta">
									<?php
										styleblog_get_categories();

										styleblog_get_post_date();

										styleblog_get_comments_no();
									?>
								</div>
						<?php
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

