<?php
/**************************************/
//Below footer function
/**************************************/
if ( ! function_exists( 'big_store_below_footer_markup' ) ){  
function big_store_below_footer_markup(){ ?>  
<?php 
$big_store_bottom_footer_layout  = get_theme_mod( 'big_store_bottom_footer_layout','ft-btm-one');
$big_store_bottom_footer_col1_set= get_theme_mod( 'big_store_bottom_footer_col1_set','text');
$big_store_bottom_footer_col2_set= get_theme_mod( 'big_store_bottom_footer_col2_set','text');
$big_store_bottom_footer_col3_set= get_theme_mod( 'big_store_bottom_footer_col3_set','text');
?>    
<div class="below-footer">
      <div class="container">
         <?php if($big_store_bottom_footer_layout=='ft-btm-one'):?>  
        <div class="below-footer-bar thnk-col-1">
          <div class="below-footer-col1"> 
            <?php big_store_bottom_footer_conetnt_col1($big_store_bottom_footer_col1_set); ?>
            </div>
                </div>
                 <?php elseif($big_store_bottom_footer_layout=='ft-btm-two'):?>
                  <div class="below-footer-bar thnk-col-2">
                    <div class="below-footer-col1"> <?php big_store_bottom_footer_conetnt_col1($big_store_bottom_footer_col1_set); ?></div>
          <div class="below-footer-col2"> <?php big_store_bottom_footer_conetnt_col2($big_store_bottom_footer_col2_set); ?></div>
        </div>
        <?php elseif($big_store_bottom_footer_layout=='ft-btm-three'):?>
        <div class="below-footer-bar thnk-col-3">
                    <div class="below-footer-col1"> <?php big_store_bottom_footer_conetnt_col1($big_store_bottom_footer_col1_set); ?></div>
          <div class="below-footer-col2"> <?php big_store_bottom_footer_conetnt_col2($big_store_bottom_footer_col2_set); ?></div>
          <div class="below-footer-col3"> <?php big_store_bottom_footer_conetnt_col3($big_store_bottom_footer_col3_set); ?></div>
        </div>
      <?php endif; ?>
        
      </div>
    </div>  
<?php }
}
add_action( 'big_store_below_footer', 'big_store_below_footer_markup' );

/**********************/
// footer function
/************************/
//************************************/
// Footer bottom col1 function
//************************************/
if ( ! function_exists( 'big_store_bottom_footer_conetnt_col1' ) ){ 
function big_store_bottom_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('big_store_footer_bottom_col1_texthtml','Copyright | Big Store| Developed by ThemeHunk'));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ) {?>
<?php 
  big_store_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-first' ) ){
    dynamic_sidebar('footer-below-first' );
     } else { ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo big_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer bottom col2 function
//************************************/
if ( ! function_exists( 'big_store_bottom_footer_conetnt_col2' ) ){ 
function big_store_bottom_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('big_store_bottom_footer_col2_texthtml',  __( 'Add your content here', 'big-store' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ) {?>
<?php 
  big_store_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-second')){
    dynamic_sidebar('footer-below-second');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
        <?php } ?>
  </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo big_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer bottom col3 function
//************************************/
if ( ! function_exists( 'big_store_bottom_footer_conetnt_col3' ) ){ 
function big_store_bottom_footer_conetnt_col3($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('big_store_bottom_footer_col3_texthtml',  __( 'Add your content here', 'big-store' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ) {?>
<?php 
  big_store_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-third')){
    dynamic_sidebar('footer-below-third');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
        <?php } ?>
  </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo big_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}

/**************************************/
//Below footer function
/**************************************/
if ( ! function_exists( 'big_store_shop_below_footer_markup' ) ){  
function big_store_shop_below_footer_markup(){ ?>   
<div class="below-footer">
      <div class="container">
        <div class="below-footer-bar thnk-col-1">
          <div class="below-footer-col1"> 
           <p class="footer-copyright">&copy;
              <?php
              echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/date */
                _x( 'Y', 'copyright date format', 'big-store' )
              );
              ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
              <span class="powered-by-wordpress">
              <span><?php _e( 'Designed by', 'big-store' ); ?></span>
              <a href="<?php echo esc_url( __( 'https://themehunk.com/', 'big-store' ) ); ?>" target="_blank">
                <?php _e( 'Themehunk', 'big-store' ); ?>
              </a>
            </span>
            </p><!-- .footer-copyright -->
           </div>
        </div>
      </div>
</div>
                  
<?php }
}
add_action( 'big_store_shop_default_bottom_footer', 'big_store_shop_below_footer_markup' );