<?php
if(get_theme_mod('jot_shop_disable_top_slider_sec',false) == true){
    return;
  }
$jot_shop_top_slide_layout = get_theme_mod('jot_shop_top_slide_layout','slide-layout-1');
?>
<section class="thunk-slider-section   <?php echo esc_attr($jot_shop_top_slide_layout);?>">
  
<?php 

if($jot_shop_top_slide_layout =='slide-layout-3'):
?>
  <?php jot_shop_display_customizer_shortcut( 'jot_shop_top_slider_section' ); ?>
    <div class="thunk-slider-content-wrap">
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-col thunk-slider-col-1">
            <div class="slider-cat-title">
              <a href="#"><?php _e('Market','jot-shop');?></a>
            </div>
            <?php jot_shop_product_list_categories_slider(); ?>
              
            </div>
          <div class="thunk-slider-col thunk-slider-col-2"><div class="thunk-3col-slider-wrap">
           <div class="thunk-slider-content">
               <div class="thunk-top2-slide owl-carousel">
                <?php jot_shop_top_slider_2_content('jot_shop_top_slide_content', ''); ?>
               </div>
             </div>
           <div class="thunk-add-content">
                 <div class="thunk-3-add-content">
                   <div class="thunk-row">
                   <a href="<?php echo esc_url(get_theme_mod('jot_shop_lay3_url'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay3_adimg'));?>"></a>
                   </div>
                   <div class="thunk-row">
                    <a href="<?php echo esc_url(get_theme_mod('jot_shop_lay3_2url'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay3_adimg2'));?>"></a>
                   </div>
                   <div class="thunk-row"><a href="<?php echo esc_url(get_theme_mod('jot_shop_lay3_3url'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay3_adimg3'));?>"></a>
                   </div>
                 </div>
            </div>
         </div>  
       </div>
         
        </div>
      </div>
    
 <?php elseif($jot_shop_top_slide_layout == 'slide-layout-4'):?>
 <div class="thunk-slider-content-wrap">
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-multi-slide owl-carousel">
            <?php jot_shop_top_slider_multi_content('jot_shop_top_slide_content', ''); ?>
          </div>
        </div>
  </div>  
 <?php elseif($jot_shop_top_slide_layout == 'slide-layout-2'):?>
 <div class="thunk-slider-content-wrap">
        <div class="thunk-slider-content-bar">
          <div class="thunk-3col-slider-wrap">
            <div class="slider-content-1">
               <div class="thunk-content-2">
                 <div class="thunk-row">
                  <a href="<?php echo esc_url(get_theme_mod('jot_shop_lay2_url'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay2_adimg'));?>"></a>
                  </div>
                 <div class="thunk-row"><a href="<?php echo esc_url(get_theme_mod('jot_shop_lay2_url2'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay2_adimg2'));?>"></a></div>
               </div>
            </div>
            <div class="slider-content-2">
              <div class="thunk-content-1">
                <div class="thunk-top2-slide owl-carousel">
                <?php jot_shop_top_slider_2_content('jot_shop_top_slide_content', ''); ?>
               </div>
              </div>
            </div>
            <div class="slider-content-3">
              <div class="thunk-content-1">
                <a href="<?php echo esc_url(get_theme_mod('jot_shop_lay2_url3'));?>"><img src="<?php echo esc_url(get_theme_mod('jot_shop_lay2_adimg3'));?>"></a>
              </div>
            </div>
          </div>
        </div>
  </div>
  <?php elseif($jot_shop_top_slide_layout == 'slide-layout-1'):?>
 <div class="thunk-slider-content-wrap">
      
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-full-slide owl-carousel">
            <?php jot_shop_top_slider_2_content('jot_shop_top_slide_content', ''); ?>
          </div>
        </div>
      
  </div> 
  <?php elseif($jot_shop_top_slide_layout == 'slide-layout-6'):?>
 <div class="thunk-slider-content-wrap">
      
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-full-slide owl-carousel categoryinfo">
            <?php jot_shop_top_slider_6_content('jot_shop_top_slide_content6', ''); ?>
            </div>

           
          </div>
        </div>
      
  </div> 
   <?php elseif($jot_shop_top_slide_layout == 'slide-layout-9'):?>
 <div class="thunk-slider-content-wrap">
      
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-full-slide owl-carousel slide-9">
            <?php jot_shop_top_slider_9_content('jot_shop_top_slide_content', ''); ?>
          </div>
        </div>
      
  </div> 

 <?php endif; ?>   

</section>