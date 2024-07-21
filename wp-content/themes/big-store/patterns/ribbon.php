<?php
/**
 * Ribbon Section
 * 
 * slug: ribbon
 * title: Ribbon Section
 * categories: bigstore
 */

return array(
    'title'      =>__( 'Ribbon Section', 'big-store' ),
    'categories' => array( 'bigstore' ),
    'content'    => '<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"100px","right":"20px","bottom":"100px","left":"20px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"#eeeeee","width":"1px"}},"color":{"background":"#4167cf"}},"className":"has-accent-background-color has-background","layout":{"type":"default"}} -->
<div class="wp-block-group has-accent-background-color has-background" style="border-bottom-color:#eeeeee;border-bottom-width:1px;background-color:#4167cf;margin-top:0;margin-bottom:0;padding-top:100px;padding-right:20px;padding-bottom:100px;padding-left:20px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"white","fontSize":"large"} -->
<h2 class="has-text-align-center has-white-color has-text-color has-large-font-size" style="font-style:normal;font-weight:600">'.esc_html__('“Vestibulum non odio nec felis mollis scelerisque”','big-store').'</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"1rem","right":"2rem","bottom":"1rem","left":"2rem"}},"color":{"text":"#4167cf"}},"className":"is-style-fill","fontSize":"normal"} -->
<div class="wp-block-button has-custom-font-size is-style-fill has-normal-font-size"><a class="wp-block-button__link has-white-background-color has-text-color has-background wp-element-button" style="border-radius:4px;color:#4167cf;padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem">'.esc_html__('Explore it','big-store').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
);