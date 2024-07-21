<?php
/**
 * Template part for displaying posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package  Big Store
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('thunk-post-article'); ?>>
					<div class="post-content-outer-wrapper">
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {?>
						<div class="thunk-post-img-wrapper">
							<div class="thunk-post-img">
								<a href="<?php the_permalink() ?>" class="post-thumb-link">
									<?php the_post_thumbnail('full'); ?>
								</a>
							</div>
						</div>
					<?php } ?>
					<div class="thunk-posts-description ">
						
						<?php the_title( '<h2 class="entry-title thunk-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						<div class="thunk-post-meta">
						<div class="thunk-post-info">
							<span><?php the_author_posts_link(); ?></span>
						    
							<span><?php the_category(' '); ?></span>
						    
						    <span><?php echo get_the_date(); ?></span>
					     </div>
						<div class="thunk-post-comments">
							<div class="thunk-comments-icon">
								<span class="thunk-comments"><a href="<?php comments_link(); ?>" title=""><?php comments_popup_link(esc_html('0','big-store'), esc_html('1','big-store'), esc_html('%','big-store')); ?></a></span>
							</div>
						</div>
					    </div>
						<div class="thunk-post-excerpt">
								<?php big_store_the_excerpt();?> 
						</div>
					</div> <!-- thunk-posts-description end -->
				</div> <!-- post-content-outer-wrapper end -->
</article>