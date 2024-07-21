<?php

if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'Taiowc_Markup' ) ):

    class Taiowc_Markup {
         /**
         * Member Variable
         *
         * @var object instance
         */
       
       private static $instance;

       /**
         * Initiator
         */
        public static function instance() {
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct(){
            

        }

        public function taiowc_cart_show(){
                  
            if ( class_exists( 'WooCommerce' ) && ! is_null( WC()->cart ) ) {
            ?>
               
                       <a class="taiowc-content" href="#">
                           
                        

                            <?php if ( ! WC()->cart->is_empty() ) { ?>

                            <div class="cart-count-item">
                                
                                <?php taiowc()->get_cart_count(); ?>
                                    
                            </div>

                            <?php } ?>
                           
                            <div class="taiowc-cart-item">

                                <div class="taiowc-icon">
                                    <?php do_action('taiowc_cart_show_icon'); ?>
                                 </div>

                                 <?php if ( ! WC()->cart->is_empty() ) {  
                                    if(taiowc()->get_option( 'taiowc-tpcrt_show_price' ) == true){ 
                                        ?>
                                 <div class="taiowc-total">

                                    <span><?php echo wp_kses_post(WC()->cart->get_cart_total()); ?></span>

                                </div>
                                <?php } } ?>

                            </div>
                        </a>
                

        <?php } 
    }


        public function taiowc_cart_item_show(){ ?>

            <div class="taiowc-cart-model">   

               <div class="taiowc-cart-model-wrap">

                    <?php $this->taiowc_cart_header();?>

                    <div class="taiowc-cart-model-body">
                        
                        <?php 

                        do_action('taiowc_mini_cart'); 


                        ?>

                    </div>

                    <div class="taiowc-cart-model-footer">

                     <?php 

                     $this->taiowc_cart_footer(); 
                    
                    ?>

                   </div>

                   

               </div>
              

                    <div class="taiowc-notice-box">

                    <span class="taiowc-notice"></span>

                    </div>

             
            </div>

            

        <?php }


        public function taiowc_cart_header(){?>


                    <div class="taiowc-cart-model-header">

                        <div class="cart-heading">

                            <?php do_action('taiowc_cart_show_icon');?>

                           <?php if(taiowc()->get_option( 'taiowc-cart_hd' )!==''){ ?>
                          <h4><?php echo esc_html(taiowc()->get_option( 'taiowc-cart_hd' ));?></h4>
                           <?php } ?>

                          <a class="taiowc-cart-close"></a>

                        </div> 

                    </div>


        <?php }


        public function taiowc_cart_footer(){ ?>

                    <?php   

                     $this->taiowc_cart_total();

                     $this->taiowc_cart_button(); 

                    ?>
        <?php }
        
          public function taiowc_cart_total(){  
        

            ?>
                <div class="cart-total">
                    <span class="taiowc-payment-title"><?php _e('Payment Details','taiowc'); ?></span>

                     <div class="taiowc-total-wrap">
                                
                            <div class="taiowc-subtotal">
                                <span class="taiowc-label"><?php _e('Sub Total','taiowc'); ?></span>
                                <span class="taiowc-value"><?php if(WC()->cart){
                                    echo wp_kses_post(WC()->cart->get_cart_subtotal());
                                 } ?></span>
                              </div>

                   </div>

                </div>


       <?php  }

        
        public function taiowc_cart_button(){ ?>
                

                     <div class="cart-button">
                            
                        <p class="buttons normal">

                        <?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
                            
                        </p>
                              
                     </div>

       <?php  }

        

}

function taiowc_markup(){

        return Taiowc_Markup::instance();

}
endif; 