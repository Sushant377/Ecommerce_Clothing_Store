<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if(th_advance_product_search()->get_option( 'show_submit' )=='0'){

$barClass='submit-no-active';

}else{

$barClass='submit-active';

}

$icon_clr = esc_html(th_advance_product_search()->get_option( 'icon_clr' ));

$uniqueID   = ++ TH_Advance_Product_Search()->searchInstances;

$layoutType = !empty($args['layout'])  ? $args['layout'] : 'default_style';

if($layoutType == 'default_style'){ ?>

<div id='thaps-search-box' class="thaps-search-box  <?php echo esc_attr($barClass);?>  <?php echo esc_attr($layoutType);?>">

<form class="thaps-search-form" action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='thaps-search-form'  method='get'>

<div class="thaps-from-wrap">

<?php

if(th_advance_product_search()->get_option('show_submit' )=='0'){

  th_advance_product_search_icon_style_svg('icon-style', $icon_clr);

} ?>
   <input id='thaps-search-autocomplete-<?php echo esc_attr($uniqueID); ?>' name='s' placeholder='<?php echo esc_attr(th_advance_product_search()->get_option( 'placeholder_text' ));?>' class="thaps-search-autocomplete thaps-form-control" value='<?php echo esc_attr(get_search_query()); ?>' type='text' title='<?php echo esc_attr_x( 'Search', 'label', 'th-advance-product-search' ); ?>' />

   <?php if(th_advance_product_search()->get_option( 'show_loader' )=='0'){ ?> 

   <div class="thaps-preloader"></div>

  <?php } ?>

  <?php

  if(th_advance_product_search()->get_option( 'show_submit' )=='1'){?>

    <button id='thaps-search-button' value="<?php echo esc_attr_x( 'Submit','submit button', 'th-advance-product-search' ); ?>" type='submit'>  

   <?php if(th_advance_product_search()->get_option( 'level_submit' )!==''){

        echo esc_html__(th_advance_product_search()->get_option( 'level_submit' ));

   }else{ 

       th_advance_product_search_icon_style_svg('icon-style', $icon_clr);

  }?></button> <?php }

    ?>
        <input type="hidden" name="post_type" value="product" />

        <span class="label label-default" id="selected_option"></span>

      </div>

 </form>

 </div>  

<!-- Bar style   -->      

<?php }elseif($layoutType == 'bar_style'){ ?>

<div id='thaps-search-box' class="thaps-search-box <?php echo esc_attr($layoutType);?>">
<form class="thaps-search-form" action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='thaps-search-form'  method='get'>

<div class="thaps-from-wrap">

  <?php th_advance_product_search_icon_style_svg('icon-style', $icon_clr);?>

   <input id='thaps-search-autocomplete-<?php echo esc_attr($uniqueID); ?>' name='s' placeholder='<?php echo esc_attr(th_advance_product_search()->get_option( 'placeholder_text' ));?>' class="thaps-search-autocomplete thaps-form-control" value='<?php echo esc_attr(get_search_query()); ?>' type='text' title='<?php echo esc_attr_x( 'Search', 'label', 'th-advance-product-search' ); ?>' />

  <?php if(th_advance_product_search()->get_option( 'show_loader' )=='0'){ ?> 

   <div class="thaps-preloader"></div>

  <?php } ?>

        <input type="hidden" name="post_type" value="product" />

        <span class="label label-default" id="selected_option"></span>

      </div>

 </form>

 </div>

<!-- Icon style   -->  

<?php }elseif($layoutType == 'icon_style'){ ?>

<div id='thaps-search-box' class="thaps-search-box <?php echo esc_attr($layoutType);?>">

<?php th_advance_product_search_icon_style_svg('click-icon', $icon_clr);?>

  <div class="thaps-icon-arrow" style=""></div>

 <form class="thaps-search-form" action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='thaps-search-form'  method='get'>
<div class="thaps-from-wrap">

  <?php th_advance_product_search_icon_style_svg('icon-style', $icon_clr);?>

   <input id='thaps-search-autocomplete-<?php echo esc_attr($uniqueID); ?>' name='s' placeholder='<?php echo esc_attr(th_advance_product_search()->get_option( 'placeholder_text' ));?>' class="thaps-search-autocomplete thaps-form-control" value='<?php echo esc_attr(get_search_query()); ?>' type='text' title='<?php echo esc_attr_x( 'Search', 'label', 'th-advance-product-search' ); ?>' />

  <?php if(th_advance_product_search()->get_option( 'show_loader' )=='0'){ ?> 

   <div class="thaps-preloader"></div>

  <?php } ?>

        <input type="hidden" name="post_type" value="product" />

        <span class="label label-default" id="selected_option"></span>

      </div>

 </form> 

</div>

<!-- mobile flexible -->

<?php }elseif($layoutType == 'flexible-style'){ 

if(wp_is_mobile()){

?>

<div id='thaps-search-box' class="thaps-search-box icon_style <?php echo esc_attr($layoutType);?>">

<?php th_advance_product_search_icon_style_svg('click-icon', $icon_clr);?>

  <div class="thaps-icon-arrow" style=""></div>

 <form class="thaps-search-form" action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='thaps-search-form'  method='get'>

<div class="thaps-from-wrap">

  <?php th_advance_product_search_icon_style_svg('icon-style', $icon_clr);?>

   <input id='thaps-search-autocomplete-<?php echo esc_attr($uniqueID); ?>' name='s' placeholder='<?php echo esc_attr(th_advance_product_search()->get_option( 'placeholder_text' ));?>' class="thaps-search-autocomplete thaps-form-control" value='<?php echo esc_attr(get_search_query()); ?>' type='text' title='<?php echo esc_attr_x( 'Search', 'label', 'th-advance-product-search' ); ?>' />

  <?php if(th_advance_product_search()->get_option( 'show_loader' )=='0'){ ?>

   <div class="thaps-preloader"></div>

  <?php } ?>

        <input type="hidden" name="post_type" value="product" />

        <span class="label label-default" id="selected_option"></span>

</div>

 </form> 

</div>
    <?php } else { ?>

<div id='thaps-search-box' class="thaps-search-box bar_style <?php echo esc_attr($layoutType);?>">
<form class="thaps-search-form" action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='thaps-search-form'  method='get'>

<div class="thaps-from-wrap">

  <?php th_advance_product_search_icon_style_svg('icon-style', $icon_clr);?>

   <input id='thaps-search-autocomplete-<?php echo esc_attr($uniqueID); ?>' name='s' placeholder='<?php echo esc_attr(th_advance_product_search()->get_option( 'placeholder_text' ));?>' class="thaps-search-autocomplete thaps-form-control" value='<?php echo esc_attr(get_search_query()); ?>' type='text' title='<?php echo esc_attr_x( 'Search', 'label', 'th-advance-product-search' ); ?>' />

  <?php if(th_advance_product_search()->get_option( 'show_loader' )=='0'){ ?>

   <div class="thaps-preloader"></div>

  <?php } ?>

        <input type="hidden" name="post_type" value="product" />

        <span class="label label-default" id="selected_option"></span>

      </div>

 </form>
 
 </div>

<?php } } 