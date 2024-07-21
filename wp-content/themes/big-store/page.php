<?php
get_header();
if(empty(get_post_meta( $post->ID, 'big_store_sidebar_dyn', true ))){
$big_store_sidebar = 'right';
}else{
$big_store_sidebar = get_post_meta( $post->ID, 'big_store_sidebar_dyn', true );
}
?>
<div id="content" class="page-content thunk-page  <?php echo esc_attr($big_store_sidebar); ?>">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                    <div class="page-head">
                   <?php big_store_get_page_title();?>
                   <?php big_store_breadcrumb_trail();?>
                    </div>
                        <div class="thunk-content-wrap">
                        <?php
                            while( have_posts() ) : the_post();
                               get_template_part( 'template-parts/content', 'page' );
                              // If comments are open or we have at least one comment, load up the comment template.
                              if ( comments_open() || get_comments_number() ) :
                                comments_template();
                               endif;
                               endwhile; // End of the loop.
                            ?>
                         </div>
                      </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php 
                if($big_store_sidebar != 'no-sidebar' ):
                get_sidebar();
                endif;
                 ?><!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>