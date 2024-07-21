<?php 
if ( ! function_exists( 'add_content_border_after_price_func' ) ) :

function add_content_border_after_price_func() {
echo '<div class="content-border"></div>';
}
endif;

if ( ! function_exists( 'add_product_sahre_button_func' ) ) :

function add_product_sahre_button_func() {
	echo'<div class="social-share"><h3>Share this product</h3><ul>'?>
	 <li class="fb-icon"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink()); ?>"><i class="fab fa-facebook-f"></i></a></li>
	 <li class="twt-icon"><a target="_blank" href="https://twitter.com/home?status=<?php the_title(); ?>-<?php esc_url(the_permalink()); ?>"><i class="fab fa-twitter"></i></a></li>
	 <li class="paintest-icon"><a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink()); ?>&amp;media=&amp;description=<?php the_title(); ?>"><i class="fab fa-pinterest-p"></i></a></li>
	 <li class="linked-icon"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink()); ?>&title=<?php the_title(); ?>&source=LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
	 <?php echo'</ul> 
	</div>';
}
endif;
?>