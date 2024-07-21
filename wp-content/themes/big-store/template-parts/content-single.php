<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Big Store
 * @since 1.0.0
 */
?>
<article class="thunk-article ">
	<div class="entry-content">
					<div class="post-content-outer-wrapper">
						<div class="thunk-posts-description">
							<div class="thunk-post-img-wrapper">
							<div class="thunk-post-img">
							<?php the_post_thumbnail('full'); ?>
						  </div>
					   </div>
					   
					<div class="thunk-post-meta">
						<div class="thunk-post-info">
							<span><?php the_author_posts_link(); ?></span>
						    
							<span><?php the_category(' '); ?></span>
						    
						    <span><?php echo get_the_date(); ?></span>
					     </div>
					   </div>
					<div class="thunk-post-excerpt">
								<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'big-store' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'big-store' ),
					'after'  => '</div>',
				) );
			?>
						</div>
						
			</div> <!-- thunk-posts-description end -->
		</div> <!-- post-content-outer-wrapper end -->
	</div>
                                       <div class="thunk-post-footer">
                                                <?php if (has_tag()) { ?>
                                                <div class="thunk-tags-wrapper">
                                                    <?php
                                                        the_tags( 'Tag : ', ' ', ' ' );
                                                    ?>
                                                </div>
                                            <?php } ?>
                                       </div> <!-- thunk-post-footer end -->
</article>