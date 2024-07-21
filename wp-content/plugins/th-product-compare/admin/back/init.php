<?php
if (!defined('ABSPATH')) exit;
class th_compare_admin
{
    public $optionName = 'th_compare_option';
    public static function get()
    {
        return new self();
    }
    private function __construct()
    {
        add_action('wp_ajax_th_compare_save_data', array($this, 'save'));
        add_action('wp_ajax_th_compare_reset_data', array($this, 'reset'));
        add_action('wp_ajax_th_compare_filter_product', array($this, 'filter_product'));
        add_action('wp_ajax_nopriv_th_compare_filter_product', array($this, 'filter_product'));
    }

    public function filter_product()
    {

        $text_ = isset( $_POST['inputs'] ) ? sanitize_text_field($_POST['inputs']):'';

        $arrArg = array(
            'post_type'     => 'product',
            'post_status'   => 'publish',
            'nopaging'      => true,
            'posts_per_page' => 100,
            's'             => $text_,
        );
        if ($text_ != '') {
            $arrArg['s'] = $text_;
            $arrArg['posts_per_page'] = 100;
        } else {
            $arrArg['posts_per_page'] = 20;
        }
        $results = new WP_Query($arrArg);
        $items = array();
        if (!empty($results->posts)) {
            foreach ($results->posts as $result) {

                $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($result->ID), 'single-post-thumbnail');
                $imageUrl = isset($imageUrl[0]) ? $imageUrl[0] : wc_placeholder_img_src();

                $items[] = array(
                    'image_url' => $imageUrl,
                    'label' => $result->post_title,
                    'id' => $result->ID,
                );
            }
        } else {
            $items['no_product'] = __('No Product Found', 'th-product-compare');
        }
        wp_send_json_success($items);
    }


    public function save()
    {
         if (!is_user_logged_in() || ! current_user_can( 'administrator' ) ) {

            wp_die( - 1, 403 );

            }
            
        if (!wp_verify_nonce($_REQUEST['nonce'], '_wpnonce')) {

                wp_die( - 1, 403 );
                
            }
        
        if (isset($_POST['inputs']) && is_array($_POST['inputs'])) {

            $result = $this->setOption($_POST['inputs']);

           if($result){

            echo esc_html('update');

           }

        }

        die();

    }

    // cookies
    public function setOption($inputs)
    {
        $checkOption = get_option($this->optionName);

        $saveOption = $this->sanitizeOptions($inputs);

        if ($checkOption) {

            $result = update_option($this->optionName, $saveOption);

        } else {

            $result = add_option($this->optionName, $saveOption);

        }

        return $result;
    }

    function sanitizeOptions($array)
    {
        foreach ($array as $key => &$value) {

            if (is_array($value)) {

                $value = $this->sanitizeOptions($value);

            } else {

                $value = sanitize_text_field($value);
            }

        }

        return $array;
    }

    public function reset()
    {

        if (!is_user_logged_in() || ! current_user_can( 'administrator' ) ) {

            wp_die( - 1, 403 );

            }
            
        if (!wp_verify_nonce($_REQUEST['nonce'], '_wpnonce')) {

                wp_die( - 1, 403 );
                
        }

        if (isset($_POST['inputs']) && $_POST['inputs'] == 'reset') {

            $checkOption = get_option($this->optionName);

            if ($checkOption) {

                delete_option($this->optionName);

                echo esc_html('reset');

            }

        }

        die();

  }

    // class end
}
