<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/***Admin Custom Style********/

function taiowc_admin_style(){ ?>

<style>
<?php 
if(taiowc()->get_option( 'taiowc-show_cart' ) == false){ ?>

#cart_style-wrapper,#taiowc-cart_open-wrapper,#taiowc_cart_styletaiowc_cart_style-section-1, .taiowc_cart_styletaiowc_cart_style-section-1{display:none;}

<?php }
?>

<?php 
if(taiowc()->get_option( 'cart_style' ) == 'style-2'){ ?>

#taiowc-fxd_cart_frm_left-wrapper,#taiowc-fxd_cart_frm_right-wrapper,#taiowc-fxd_cart_frm_btm-wrapper{display:none;}

<?php }
?>

<?php 
if(taiowc()->get_option( 'taiowc-fxd_cart_position' ) == 'fxd-left'){ ?>

#taiowc-fxd_cart_frm_right-wrapper{display:none;}

<?php }
?>
<?php 
if(taiowc()->get_option( 'taiowc-fxd_cart_position' ) == 'fxd-right'){ ?>

#taiowc-fxd_cart_frm_left-wrapper{display:none;}

<?php }
?>


<?php 
if(taiowc()->get_option( 'taiowc-cart-icon' ) == 'icon-7'){ ?>

#icon_url-wrapper{display:contents;}

<?php }
?>



<?php 

if(taiowc()->get_option( 'taiowc-cart_pan_notify_shw' ) == false){ ?>

#taiowc-success_mgs_bg_clr-wrapper, #taiowc-success_mgs_txt_clr-wrapper, #taiowc-error_mgs_bg_clr-wrapper, #taiowc-error_mgs_txt_clr-wrapper{display:none;}

<?php }

?>

<?php 

if(taiowc()->get_option( 'taiowc-cart_pan_icon_shw' ) == false){ ?>
	
#taiowc-cart_pan_icon_clr-wrapper{display:none;}

<?php }

?>

</style>
	
<?php }

add_action('admin_head', 'taiowc_admin_style');