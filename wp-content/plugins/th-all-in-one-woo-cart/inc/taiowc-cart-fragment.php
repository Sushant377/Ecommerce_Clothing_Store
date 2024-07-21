<?php

if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'Taiowc_Cart_Fragment' ) ):

    class Taiowc_Cart_Fragment {

        /**
         * Member Variable
         *
         * @var object instance
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance() {

            if ( ! isset( self::$instance ) ) {

                self::$instance = new self();

            }

            return self::$instance;

        }

        /**
         * Constructor
         */

        public function __construct(){

            add_action( 'wc_ajax_get_refreshed_fragments', array( $this, 'get_refreshed_fragments' ) );
     
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'taiowc_cart_show' ));
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'taiowc_cart_item_show' ));
               
        }

        public function get_refreshed_fragments(){
            
        WC_AJAX::get_refreshed_fragments();

        }


        public function taiowc_cart_show($fragments){

             ob_start();

            ?>
                       <a class="taiowc-content" href="#">
                        
                          

                           <?php if ( ! WC()->cart->is_empty() ) {
                            ?>
                            <div class="cart-count-item">

                                <?php taiowc()->get_cart_count() ?>
                                    
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
                

        <?php 
                    $fragments['a.taiowc-content'] = ob_get_clean();
                    
                    return $fragments;


      }



     public function taiowc_cart_item_show($fragments){ 
              
               ob_start();   

            ?>
               
               <div class="taiowc-cart-model-wrap">

               <?php taiowc()->taiowc_print_notices_html('cart');?>

                <?php taiowc_markup()->taiowc_cart_header();?>

                
                    <div class="taiowc-cart-model-body">
                        
                        <?php 

                        do_action('taiowc_mini_cart'); 

                        ?>

                    </div>

                    <div class="taiowc-cart-model-footer">

                     <?php 

                     if ( ! WC()->cart->is_empty() ) {


                     taiowc_markup()->taiowc_cart_footer(); 

                     }
                    
                    ?>

                   </div> 

               </div>

               <?php 


               $fragments['div.taiowc-cart-model-wrap'] = ob_get_clean();
                    
                return $fragments;

            
        }


    }


endif; 

Taiowc_Cart_Fragment::get_instance();