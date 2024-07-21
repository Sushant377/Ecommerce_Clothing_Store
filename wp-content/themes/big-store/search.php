<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeHunk
 * @subpackage  Big Store
 * @since 1.0.0
 */
get_header();
?>
     <div id="content" class="page-content">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                                 <?php
			if( have_posts()): ?>
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				get_template_part( 'template-parts/content', 'search' );
				endwhile;
				
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
                           </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php get_sidebar(); ?><!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
     </div> <!-- end content page-content -->
<?php get_footer();?>