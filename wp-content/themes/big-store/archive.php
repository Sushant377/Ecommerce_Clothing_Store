<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Big Store
 * @since 1.0.0
 */
get_header();
if(empty(get_post_meta( $post->ID, 'big_store_sidebar_dyn', true ))){
$big_store_sidebar = 'right';
}else{
$big_store_sidebar = get_post_meta( $post->ID, 'big_store_sidebar_dyn', true );
}?>
<div id="content" class="page-content archive  <?php echo esc_attr($big_store_sidebar); ?>">
            <div class="content-wrap" >
                <div class="container">
                    <div class="main-area">
                        <div id="primary" class="primary-content-area">
                            <div class="page-head">
                   <?php big_store_get_page_title();?>
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
                get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;

           big_store_post_loader();
            ?>
                           </div> <!-- end primary-content-wrap-->
                        </div> <!-- end primary primary-content-area-->
                        <?php if(big_store_is_blog()){
                               if(get_post_meta(get_option( 'page_for_posts' ),$big_store_sidebar)!='no-sidebar'){
                                            get_sidebar();
                            }
                        } ?><!-- end sidebar-primary  sidebar-content-area-->
                    </div> <!-- end main-area -->
                </div>
            </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>