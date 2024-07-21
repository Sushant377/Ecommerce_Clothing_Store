<?php
get_header();
if(empty(get_post_meta( $post->ID, 'big_store_sidebar_dyn', true ))){
$big_store_sidebar = 'right';
}else{
$big_store_sidebar = get_post_meta( $post->ID, 'big_store_sidebar_dyn', true );
}?>
<div id="content" class="page-content thunk-single-post  <?php echo esc_attr($big_store_sidebar); ?>">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
                   <div class="page-head">
                    <?php the_title( '<h1 class="entry-title thunk-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
                   <?php big_store_breadcrumb_trail();?>
                    </div>
        					<div class="primary-content-wrap">
                                  <?php
                                        if( have_posts()):
                                            /* Start the Loop */
                                            while ( have_posts() ) : the_post();
                                                /*
                                                 * Include the Post-Format-specific template for the content.
                                                 * If you want to override this in a child theme, then include a file
                                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                                 */
                                            get_template_part( 'template-parts/content', 'single');?>

                                            <div class="thunk-related-links ">
                                            <?php the_post_navigation();?>
                                            </div>
                                          
                                           <?php 
                                           // Author bio.
                                            if ( 'post' === get_post_type() ) :
                                            get_template_part( 'template-parts/author-bio' );
                                            endif;
                                            // If comments are open or we have at least one comment, load up the comment template.
                                            if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                            endif;
                                            endwhile;
                                        endif;
                                        ?>
                           </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php 
            if(get_theme_mod('big_store_blog_single_sidebar_disable')!==true):
                if($big_store_sidebar != 'no-sidebar' ):
                get_sidebar();
                endif;
            endif;
                 ?><!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>