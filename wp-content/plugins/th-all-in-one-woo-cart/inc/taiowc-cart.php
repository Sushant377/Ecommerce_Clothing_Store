<?php

if ( ! defined( 'ABSPATH' ) ) exit;


$uniqueID   = ++ taiowc()->cartInstances;

$layoutType = !empty($args['layout'])  ? $args['layout'] : '';

$cartStyle = 'taiowc-slide-right';

?>

<div id="<?php echo esc_attr($uniqueID); ?>" class="taiowc-wrap  <?php echo esc_attr($cartStyle); ?>  <?php echo esc_attr($layoutType); ?>">
			
			<?php 


            taiowc_markup()->taiowc_cart_show();
    
			
			taiowc_markup()->taiowc_cart_item_show();


			?>
</div>