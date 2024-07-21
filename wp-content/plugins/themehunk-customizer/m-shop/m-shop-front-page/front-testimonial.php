<?php
if(get_theme_mod('m_shop_disable_testimonial_sec',false) == true){
    return;
  }
?>
<section class="testimonial-section">
  <?php m_shop_display_customizer_shortcut( 'm_shop_testimonial' );?>
<div class="thunk-testimonials-wrapper">
   			<div class="thunk-testimonial-part">
				<div class="container">
				<div class="th-testimonial owl-carousel">
		<?php   
		 $default = M_Shop_Defaults_Models::instance()->get_testimonials_default();

		          m_shop_testimonials_content('m_shop_testimonials_content', $default);
		?>  
            </div>
          </div>
   		</div>
   	</div>
   </section>