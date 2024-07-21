<?php 
/**
 * Footer Function for big store theme.
 * 
 * @package     big store
 * @author      big store
 * @copyright   Copyright (c) 2019, big store
 * @since       big store 1.0.0
 */
/**************************************/
//Top footer function
/**************************************/
if ( ! function_exists( 'big_store_top_footer_markup' ) ){  
function big_store_top_footer_markup(){ ?>  
<?php 
$big_store_above_footer_layout    = get_theme_mod( 'big_store_above_footer_layout','ft-abv-none');
$big_store_above_footer_col1_set  = get_theme_mod( 'big_store_above_footer_col1_set','text');
$big_store_above_footer_col2_set  = get_theme_mod( 'big_store_above_footer_col2_set','text');
$big_store_above_footer_col3_set  = get_theme_mod( 'big_store_above_footer_col3_set','text');
?>	
<div class="top-footer">
      <div class="container">
          <?php if($big_store_above_footer_layout=='ft-abv-one'):?>	
          	 <div class="top-footer-bar thnk-col-1">
		             <div class="top-footer-col1">
		             	<?php big_store_top_footer_conetnt_col1($big_store_above_footer_col1_set); ?>
		             </div>
		             </div>
		             <?php elseif($big_store_above_footer_layout=='ft-abv-two'):?>
		             <div class="top-footer-bar thnk-col-2">
		             <div class="top-footer-col1">
		             	<?php big_store_top_footer_conetnt_col1($big_store_above_footer_col1_set); ?>
		             </div>	
		             	<div class="top-footer-col2">
                    <?php big_store_top_footer_conetnt_col2($big_store_above_footer_col2_set); ?>
                    </div></div>

		             	<?php elseif($big_store_above_footer_layout=='ft-abv-three'):?>
		             		<div class="top-footer-bar thnk-col-3">
		             		<div class="top-footer-col1">
		             	<?php big_store_top_footer_conetnt_col1($big_store_above_footer_col1_set); ?>
		                </div>	
		             	<div class="top-footer-col2"><?php big_store_top_footer_conetnt_col2($big_store_above_footer_col2_set); ?></div>
		             	<div class="top-footer-col3"><?php big_store_top_footer_conetnt_col3($big_store_above_footer_col3_set); ?></div>
		             </div>
		         <?php endif;?> 
         <!-- end top-footer-bar -->
      </div>
 </div> 
<?php }
}
add_action( 'big_store_top_footer', 'big_store_top_footer_markup' );
/**************************************/
//Widgett footer function
/**************************************/
if ( ! function_exists( 'big_store_widget_footer_markup' ) ){  
function big_store_widget_footer_markup(){ 
$big_store_bottom_footer_widget_layout  = get_theme_mod( 'big_store_bottom_footer_widget_layout','ft-wgt-none');	
	?>  
        <div class="widget-footer">
			<div class="container">
               	<?php if($big_store_bottom_footer_widget_layout =='ft-wgt-one'):?>
				<div class="widget-footer-wrap thnk-col-1">
					<div class="widget-footer-col1">
						<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?>
                      </div>
				</div>
				  <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-two'): ?>
					
                   <div class="widget-footer-wrap thnk-col-2">
					      <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
				   </div>
                  <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-three'): ?>

                  	 <div class="widget-footer-wrap thnk-col-3">
					      <div class="widget-footer-col1">

					      	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					        <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?>
                               </a>
                          <?php }?>


     	                 </div>
				   </div>
				    <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-four'): ?>
				    	 <div class="widget-footer-wrap thnk-col-4">
					      <div class="widget-footer-col1">

					      	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					        <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?>
                               </a>
                          <?php }?>

                          
     	                 </div>
					         <div class="widget-footer-col4"><?php if( is_active_sidebar('footer-4' ) ){
                                       dynamic_sidebar('footer-4' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?>
                               </a>
                          <?php }?>

                          
     	                 </div>
				    </div>

				   <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-five'): ?> 
				   	<div class="widget-footer-wrap thnk-col-3-1-2 ">
					      <div class="widget-footer-col1">

					      	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					        <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?>
                               </a>
                          <?php }?>


     	                 </div>
				          </div>
				      <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-six'): ?> 
				   	<div class="widget-footer-wrap thnk-col-3-2-1-2">
					      <div class="widget-footer-col1">

					      	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					        <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?>
                               </a>
                          <?php }?>


     	                 </div>
				          </div>  
				    <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-seven'): ?> 
				   	<div class="widget-footer-wrap thnk-col-2-1-2">
					    <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
				      </div> 
				      <?php elseif($big_store_bottom_footer_widget_layout =='ft-wgt-eight'): ?> 
				   	<div class="widget-footer-wrap thnk-col-2-2-1">
					      <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
					       <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'big-store' );?></a>
                          <?php }?></div>
				      </div>
				   <?php endif;?>
				
			</div>
		</div>  
<?php }
}
add_action( 'big_store_widget_footer', 'big_store_widget_footer_markup' );


//************************************/
// Footer top col1 function
//************************************/
if ( ! function_exists( 'big_store_top_footer_conetnt_col1' ) ){  
function big_store_top_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('big_store_footer_col1_texthtml',  __( 'Add your content here', 'big-store' )));?>
</div>
<?php }
elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ){?>
<?php 
  big_store_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-first' ) ){
    dynamic_sidebar('footer-top-first' );
     }else{?>
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
// Footer top col2 function
//************************************/
if ( ! function_exists( 'big_store_top_footer_conetnt_col2' ) ){  
function big_store_top_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('big_store_above_footer_col2_texthtml',  __( 'Add your content here', 'big-store' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ){?>
<?php 
  big_store_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-second' ) ){
    dynamic_sidebar('footer-top-second' );
     }else{?>
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
// Footer top col3 function
//************************************/
if ( ! function_exists( 'big_store_top_footer_conetnt_col3' ) ){  
function big_store_top_footer_conetnt_col3($content){?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('big_store_above_footer_col3_texthtml',  __( 'Add your content here', 'big-store' )));;?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('big-store-footer-menu' ) ){ ?>
<?php 
  big_store_footer_nav_menu();
 } else { ?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'big-store' );?></a>
<?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-third' ) ){
    dynamic_sidebar('footer-top-third' );
     }else{?>
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
