<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'TH_Advancde_Product_Search_Functions' ) ):

	class TH_Advancde_Product_Search_Functions {

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

          
           add_action( 'wp_ajax_thaps_ajax_get_search_value',array( $this, 'thaps_ajax_get_search_value' ));
           add_action( 'wp_ajax_nopriv_thaps_ajax_get_search_value',array( $this, 'thaps_ajax_get_search_value' ));


		}

	 /**
     * Get tax query
     *
     * return array
     */
     public function getTaxQuery(){

        $product_visibility_term_ids = wc_get_product_visibility_term_ids();

        $tax_query = array(

            'relation' => 'AND',
        );

        $tax_query[] = array(

            'taxonomy' => 'product_visibility',
            'field'    => 'term_taxonomy_id',
            'terms'    => $product_visibility_term_ids['exclude-from-search'],
            'operator' => 'NOT IN',
        );

        // Exclude out of stock products from suggestions

        if (get_option('woocommerce_hide_out_of_stock_items')=='yes') {

            $tax_query[] = array(

                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $product_visibility_term_ids['outofstock'],
                'operator' => 'NOT IN',
            );
        }

        return $tax_query;

    }

	/**************/
	//Heading Show
	/**************/
	public function thaps_show_heading($heading_label){

	      return  array(
	                    'value'  => $heading_label,
	                    'type'   => 'heading',
	                );
	}

	/**************/
	//No Reult Show
	/**************/
	public function thaps_show_no_result($no_reult_label){

	      return  array(
	                   'value'  => $no_reult_label,
	                   'type'   => 'no-result',
	                );
	}

    /**************/
	//Get image
	/**************/
	public function thaps_getImages_src( $id, $size, $enble){

       if($enble == true){

          $thumbnail_id = get_term_meta($id, 'thumbnail_id', true ); 

          $imageSrc = wp_get_attachment_image_src( $thumbnail_id, $size );

				    if ( is_array( $imageSrc ) && !empty($imageSrc[0]) ){

				       $src = $imageSrc[0];
		  }

		  return $src;

		}else{

			return $src = '';
		}


	}
   
	/**********************/
	//Get Product Category
	/*********************/
	public function thaps_ajax_product_getCategories( $keyword, $limit, $img_enable){

	        $results = array();

	        $args = array(

	            'taxonomy' => 'product_cat',
	        );

	        $productCategories = get_terms( 'product_cat', $args );
	        $keywordUnslashed = wp_unslash( $keyword );
	  
	        $i = 0;

	        foreach ( $productCategories as $cat ) {

	            if ( $i < $limit ) {

	                $catName = html_entity_decode( $cat->name );

	                $pos = strpos( mb_strtolower( $catName ), mb_strtolower( $keywordUnslashed ) );
				    
	                if ( $pos !== false ) {
	                    $results[$i] = array(
	                        'term_id'     => $cat->term_id,
	                        'taxonomy'    => 'product_cat',
	                        'value'       => $catName,
	                        'url'         => get_term_link( $cat, 'product_cat' ),
	                        'cat_img'     => $this->thaps_getImages_src($cat->term_id,'woocommerce_thumbnail', $img_enable),
	                        'type'        => 'taxonomy-product-cat',
	                    );
	                    $i++;

	                }
	            
	            }
	        
	        }

	        return $results;
	}

	/**********************/
	//Get Post Category
	/*********************/
	public function thaps_ajax_post_getCategories( $keyword, $limit){

	        $results = array();

	        $args = array(

	            'taxonomy' => 'category',
	        );

	        $productCategories = get_terms( 'category', $args );

	        $keywordUnslashed = wp_unslash( $keyword );
	  
	        $i = 0;

	        foreach ( $productCategories as $cat ) {

	            if ( $i < $limit ) {

	                $catName = html_entity_decode( $cat->name );

	                $pos = strpos( mb_strtolower( $catName ), mb_strtolower( $keywordUnslashed ) );

	                if ( $pos !== false ) {
	                    $results[$i] = array(
	                        'term_id'     => $cat->term_id,
	                        'taxonomy'    => 'category',
	                        'value'       => $catName,
	                        'url'         => get_term_link( $cat, 'category' ),
	                        'type'        => 'taxonomy-post-cat',
	                    );

	                    $i++;
	                }
	            
	            }
	        
	        }

	        return $results;
	}

		/*************/
		//Show More
		/*************/
		public function thaps_show_more( $count, $more_reult_label, $match, $select_srch_type){
		            
		                $moreproduct = array(
		                    'id'    => 'more-result',
		                    'value' => '',
		                    'text'  => $more_reult_label,
		                    'total' => $count,
		                    'type'  => 'more_item',
		                );

		                if($select_srch_type == 'product_srch'){

		                   $moreproduct['url'] = add_query_arg( array(
		                    's'         => $match,
		                    'post_type' => 'product',
		                ), home_url() );

		                }elseif($select_srch_type == 'post_srch'){

		                     $moreproduct['url'] = add_query_arg( array(
		                    's'         => $match,
		                    'post_type' => 'post',
		                ), home_url() );

		                }elseif($select_srch_type == 'page_srch'){

		                    $moreproduct['url'] = add_query_arg( array(
		                    's'         => $match,
		                    'post_type' => 'page',
		                ), home_url() );

		                }

		                return $moreproduct; 
		         

		}


    /*****************/		
    // Excerpt Length
    /****************/   
	public function thaps_excerpt_shw( $id , $length){
       
		$excerpt = get_the_excerpt($id);

		if(strlen($excerpt) <= $length){

			return $excerpt;

		}else{
			
		$excerpte = substr($excerpt, 0, $length);

		$result  = substr($excerpte, 0, strrpos($excerpte, ' '));

		return $result . '&nbsp;...';
		
		}

		

	}


	/************************/
	// Get Product id by sku
	/************************/
	public function get_product_sku($skus){

		    global $wpdb; 

		    $return = array();

		     foreach ($skus as $sku){

		         if (empty($sku)) {
		             continue;
		         }

		         $return[] = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );
		     }

		     return $return;
		}

	/************************/
	// Get Array To String
	/************************/
	public function to_convert_array($string){  

		if($string !==''){ 

		$toarray = explode(', ', $string);

		return $toarray;

		 }

	}


	/*************************/
    // search result function
	/*************************/
		public function thaps_ajax_get_search_value(){

        //setting value
        $select_srch_type = esc_html(th_advance_product_search()->get_option( 'select_srch_type' ));
    
        $limit =  esc_html(th_advance_product_search()->get_option( 'result_length' ));

        $no_reult_label =  esc_html(th_advance_product_search()->get_option( 'no_reult_label' ));
        $more_reult_label =  esc_html(th_advance_product_search()->get_option( 'more_reult_label' ));

        $enable_group_heading =  esc_html(th_advance_product_search()->get_option( 'enable_group_heading' ));

        $enable_product_image =  esc_html(th_advance_product_search()->get_option( 'enable_product_image' ));

        $enable_product_price =  esc_html(th_advance_product_search()->get_option( 'enable_product_price' ));

        $enable_product_desc =  esc_html(th_advance_product_search()->get_option( 'enable_product_desc' ));

        $enable_product_sku =  esc_html(th_advance_product_search()->get_option( 'enable_product_sku' ));


        $show_category_in =  esc_html(th_advance_product_search()->get_option( 'show_category_in' ));

        $enable_cat_image =  esc_html(th_advance_product_search()->get_option( 'enable_cat_image' ));


        $category_hd = __('Category','th-advance-product-search');

        $product_hd  = __('Product','th-advance-product-search');
        
        $product_exclude = esc_html(th_advance_product_search()->get_option( 'exclude_product_sku' ));
        
        $exp_length = esc_html(th_advance_product_search()->get_option( 'desc_excpt_length' ));

        // Post

        $post_hd  = __('Post','th-advance-product-search');

        $enable_post_image =  esc_html(th_advance_product_search()->get_option( 'enable_post_image' ));

        $enable_post_desc =  esc_html(th_advance_product_search()->get_option( 'enable_post_desc' ));

        // Page

        $page_hd  = __('Pages','th-advance-product-search');

        $enable_page_image =  esc_html(th_advance_product_search()->get_option( 'enable_page_image' ));

        $enable_page_desc =  esc_html(th_advance_product_search()->get_option( 'enable_page_desc' ));

        /*********************/
        //fetch product result
        /*********************/
         if (isset($_REQUEST['match']) && $_REQUEST['match'] != ''){

            $match_ = sanitize_text_field($_REQUEST['match']);

            if ($select_srch_type=='product_srch'){ 
              $args = array(
                'posts_per_page'      => -1,
                'post_type'           => 'product',
                'post_status'         => array('publish'),
                'ignore_sticky_posts' => 1,
                'order'               => 'DESC',
                's'                   => $match_,
             ); 

             
             $args['tax_query'] = $this->getTaxQuery();

             if( $product_exclude !==''){

                 $exclude_array = $this->to_convert_array($product_exclude);

                 $args['post__not_in'] = $this->get_product_sku($exclude_array);
             }
             
          
             $results = new WP_Query($args);

             $count = ( isset( $results->posts ) ? count( $results->posts ) : 0 );

             $items = array();

             // category show 

             if($show_category_in == true){

                if($enable_group_heading == true){

                    $items['suggestions'][] = $this->thaps_show_heading($category_hd);

               }

               $categories = $this->thaps_ajax_product_getCategories( $match_, $limit, $enable_cat_image );

               if(!empty($categories)){

               foreach ( $categories as $result ){

                    $items['suggestions'][] = $result;
                }

              }else{

                    $items['suggestions'][] = $this->thaps_show_no_result($no_reult_label);
                }
             
              }


              if($enable_group_heading == true){

                  $items['suggestions'][] = $this->thaps_show_heading($product_hd);
              }

              if (!empty($results->posts)){

                 

              foreach (array_slice($results->posts,0,$limit) as $result){

                $product = wc_get_product($result->ID);

                $r = array(
                  'value'   => $result->post_title,
                  'title'   => $result->post_title,
                  'id'      => $result->ID,
                  'url'     => get_permalink($result->ID), 
                  'type'    => 'product', 
                );

                if ( $enable_product_image == true) {

                        $r['imgsrc'] = wp_get_attachment_url($product->get_image_id(), 'woocommerce_thumbnail'); 

                }
                if ( $enable_product_price == true) {

                        $r['price'] = $product->get_price_html();

                }
                if ( $enable_product_sku == true) {

                        $r['sku'] = $product->get_sku();

                }
                
                if ( $enable_product_desc == true) {

                        $r['desc'] = $this->thaps_excerpt_shw($result->ID , $exp_length);

                }

                $items['suggestions'][] = $r;

              }

                if($limit < $count){

                    $items['suggestions'][] = $this->thaps_show_more($count, $more_reult_label, $match_, $select_srch_type);

                }
                 
               
             
            }else{

                $items['suggestions'][] = $this->thaps_show_no_result($no_reult_label);
            }

        //search type product close 

        // Start Post Search  
         
        }elseif($select_srch_type=='post_srch'){

          $results = new WP_Query(
	            array(
	              'post_type'     => 'post',
	              'post_status'   => array('publish'),
	              'nopaging'      => true,
	              'posts_per_page' => 100,
	              's'             => $match_,
	             )
           );  

             $count = ( isset( $results->posts ) ? count( $results->posts ) : 0 );

             $items = array();   

             // category show 
             if($show_category_in == true){

                if($enable_group_heading == true){

                  $items['suggestions'][] = $this->thaps_show_heading($category_hd);

               }

               $categories = $this->thaps_ajax_post_getCategories( $match_, $limit );

               if(!empty($categories)){

               foreach ( $categories as $result ){

                    $items['suggestions'][] = $result;
                }

              }else{

                    $items['suggestions'][] = $this->thaps_show_no_result($no_reult_label);

                }
             
              }   

             if($enable_group_heading == true){   

             $items['suggestions'][] = $this->thaps_show_heading($post_hd);

             }    

             if (!empty($results->posts)){

             

             foreach (array_slice($results->posts,0,$limit) as $result){

                $r = array(
                  'value'   => $result->post_title,
                  'title'   => $result->post_title,
                  'id'      => $result->ID,
                  'url'     => get_permalink($result->ID), 
                  'type'    => 'post', 
                ); 

              if ( $enable_post_image == true) {

               $post_imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($result->ID),'thaps-thumb-img');

                if ( is_array( $post_imgsrc ) && ! empty( $post_imgsrc[0] ) ) {

                    $src = $post_imgsrc[0];

                    $r['imgsrc'] = $src;
                 }

                }
              if ( $enable_post_desc == true) {  

                $r['desc'] = $this->thaps_excerpt_shw($result->ID , $exp_length);

              }

                $items['suggestions'][] = $r;
                
               
             }
             if($limit < $count){
                    $items['suggestions'][] = $this->thaps_show_more($count, $more_reult_label, $match_, $select_srch_type);
                }

             }else{

                $items['suggestions'][] = $this->thaps_show_no_result($no_reult_label);
             }

          //search type product close 

          // Start Page Search

         }elseif($select_srch_type=='page_srch'){

             $results = new WP_Query(
	             	array(
	              'post_type'     => 'page',
	              'post_status'   => array('publish'),
	              'nopaging'      => true,
	              'posts_per_page' => 100,
	              's'             => $match_,
	             )
             );  


             $count = ( isset( $results->posts ) ? count( $results->posts ) : 0 );

             $items = array();   

                   
             if (!empty($results->posts)){

             if($enable_group_heading == true){   

               $items['suggestions'][] = $this->thaps_show_heading($page_hd);

             }
             foreach (array_slice($results->posts,0,$limit) as $result){

                $r = array(
                  'value'   => $result->post_title,
                  'title'   => $result->post_title,
                  'id'      => $result->ID,
                  'url'     => get_permalink($result->ID), 
                  'type'    => 'page', 
                ); 

              if ( $enable_page_image == true) { 

               $post_imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($result->ID),'thaps-thumb-img');

                if ( is_array( $post_imgsrc ) && ! empty( $post_imgsrc[0] ) ) {

                    $src = $post_imgsrc[0];

                    $r['imgsrc'] = $src;

                }

               }

               if ( $enable_page_desc == true) {  

                $r['desc'] = $this->thaps_excerpt_shw($result->ID , $exp_length);

               }


                $items['suggestions'][] = $r;
                
               
             }

             if($limit < $count){

                    $items['suggestions'][] = $this->thaps_show_more($count, $more_reult_label, $match_, $select_srch_type);
                }

             }else{

                $items['suggestions'][] = $this->thaps_show_no_result($no_reult_label);
             }


          //search type product close 
         }
            
        echo json_encode($items);

            die();
         }
    }

	

	}
endif;	

TH_Advancde_Product_Search_Functions::get_instance();