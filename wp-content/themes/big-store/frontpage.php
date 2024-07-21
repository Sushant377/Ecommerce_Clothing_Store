<?php 
/**
 * Template Name: Homepage Template
 * @package ThemeHunk
 * @subpackage Big Store
 * @since 1.0.0
 */
get_header();?>
   <div id="content">
        	<div class="content-wrap" >
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                        <?php
                          if( shortcode_exists( 'big-store' ) ){
                             do_shortcode("[big-store section='big_store_show_frontpage']");
                          }
                        ?>
        					</div>  <!-- end primary-content-wrap-->
        				</div>  <!-- end primary primary-content-area-->
        				
        			</div> <!-- end main-area -->

        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();