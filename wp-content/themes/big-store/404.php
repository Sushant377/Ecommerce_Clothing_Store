<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ThemeHunk
 * @subpackage Big Store
 * @since 1.0.0
 */
get_header();?>
<div id="content" class="page-content">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="thunk-content-wrap">
                                <article id="error-404" >
			<div class="error-404 not-found">
				<div class="error-heading">
					<h2 class="thunk-page-top-title entry-title"><?php esc_html_e( '404', 'big-store' ); ?></h2>
					<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'big-store' ); ?></h3>
				</div><!-- .error-heading -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'big-store' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-404',
					'depth'          => 1,
					'container'      => 'div',
					'container_id'   => 'quick-links-404',
					'fallback_cb'    => false,
					) );
				?>
			</div><!-- .error-404 -->
          </article>
                           </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php get_sidebar(); ?><!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>