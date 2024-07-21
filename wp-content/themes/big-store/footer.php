<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package  Big Store
 * @since 1.0.0
 */ 
?>
<footer>
         <?php 
         
          // top-footer 
          do_action( 'big_store_top_footer' ); 

          // widget-footer
		      do_action( 'big_store_widget_footer' );

		      // below-footer
          if (function_exists( 'big_store_pro_load_plugin' ) ){

            do_action( 'big_store_below_footer' );  

          }else{

            do_action('big_store_shop_default_bottom_footer'); 

          }
  
        ?>
     </footer> <!-- end footer -->
    </div> <!-- end bigstore-site -->
<?php wp_footer(); ?>
</body>
</html>

