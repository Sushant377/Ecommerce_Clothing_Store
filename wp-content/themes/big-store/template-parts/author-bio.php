<?php
/**
 * Template part for displaying author bio.
 *
 * @package  Big Store
 * @since 1.0.0
 */
?>
<article class="authorbox">
	<div class="thunk-author-bio">
	<?php if ( get_option( 'show_avatars' ) ) : ?>
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), '110', '' ); ?>
		</div><!-- .author-avatar -->
<?php endif; ?>
	<div class="author-info">
		<h4 class="author-header">
			<?php esc_html_e( 'Written by', 'big-store' ); ?> <?php the_author_posts_link(); ?>
		</h4>
		<div class="author-content">
			<p><?php the_author_meta( 'description' ); ?></p>
		</div><!-- .author-content -->
	</div><!-- .author-info -->
</div>
</article><!-- .authorbox -->
