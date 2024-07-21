<?php
if (!defined('ABSPATH')) exit;
class th_product_compare_shortcode
{
    public $cookiesName;
    public $optionName = 'th_compare_option';
    function __construct()
    {
        $cookiesName = th_product_compare::cookieName();
    }
    public function getPrevId()
    {
        if (isset($_COOKIE[$this->cookiesName]) && $_COOKIE[$this->cookiesName] != '') {

            $getPRoductId = sanitize_text_field($_COOKIE[$this->cookiesName]);

            if ($getPRoductId) {

                $removeSlace = stripslashes($getPRoductId);

                $removeSlace = json_decode($removeSlace);

                $decodeArray = [];

                foreach ($removeSlace as $array_value) {

                    $decodeArray[] = th_product_compare::th_decrypt($array_value);
                }

                return $decodeArray;
            }
        }
    }

    public function get()
    {
        add_shortcode('th_compare', array($this, 'compare'));

        $this->showAndHideSingle();
    }

    public function showAndHideShopPage()
    {
        // all option

        $checkOption = get_option($this->optionName);

        // button type 
        if ($checkOption && is_array($checkOption) && !empty($checkOption)) {

            // list product content 

            if (isset($checkOption['field-product-page'])) {

                if ($checkOption['field-product-page'] == '1') {

                    add_action('woocommerce_after_shop_loop_item', array($this, 'addCompareBtn'), 11);
                }
            } else {

                add_action('woocommerce_after_shop_loop_item', array($this, 'addCompareBtn'), 11);
            }
        } else {

            add_action('woocommerce_after_shop_loop_item', array($this, 'addCompareBtn'), 11);
        }
    }

    public function showAndHideSingle()
    {
        // all option 
        $checkOption = get_option($this->optionName);

        // button type 

        if ($checkOption && is_array($checkOption) && !empty($checkOption)) {

            // single product content 

            if (isset($checkOption['field-product-single-page'])) {

                if ($checkOption['field-product-single-page'] == '1') {

                    add_action('woocommerce_after_add_to_cart_form', array($this, 'addCompareBtn'), 30);
                }
            } else {

                add_action('woocommerce_after_add_to_cart_form', array($this, 'addCompareBtn'), 30);
            }
        } else {

            add_action('woocommerce_after_add_to_cart_form', array($this, 'addCompareBtn'), 30);
        }
    }

    public function addCompareBtn()
    {
        global $product;

        $productId = intval($product->get_id());

        if ($productId) {

            $this->btnBYoption($productId);
        }
    }

    // show compare by shortcode

    public function compare($atts, $content)
    {

        $a = shortcode_atts(['pid' => ''], $atts);

        $product_id = intval($a['pid']);

        if ($product_id) {

            $this->btnBYoption($product_id);
        }
    }

    public function btnBYoption($product_id)
    {

        $compareText = __('Compare', 'th-product-compare');

        $btnClass = 'th-product-compare-btn button';

        $compareBtnTypeClass = 'btn_type';

        $checkOption = get_option($this->optionName);

        // button type 

        if (is_array($checkOption) && !empty($checkOption)) {

            if (isset($checkOption['compare-btn-type']) && $checkOption['compare-btn-type'] == 'link') {

                $compareBtnTypeClass = 'txt_type';
            }

            // btn text 

            if (isset($checkOption['compare-btn-text']) && $checkOption['compare-btn-text']) {

                $compareText = $checkOption['compare-btn-text'];
            }
        }

        $btnClass .= ' ' . $compareBtnTypeClass;

        // previous cookies class 

        $previousCookie = $this->getPrevId();

        if (!empty($previousCookie)) {

            $getExist = in_array($product_id, $previousCookie);

            if ($getExist) {

                $btnClass .= ' th-added-compare';
            }
        }
?>
        <div class='th-product-compare-btn-wrap'>
            <a href="#" class="<?php echo esc_attr($btnClass) ?>" data-th-product-id="<?php echo esc_attr($product_id) ?>">
                <?php echo esc_html($compareText); ?>
            </a>
        </div>
<?php
    }
    // class end
}


function th_compare_add_action_shop_list()
{

    $obj = new th_product_compare_shortcode();

    $obj->showAndHideShopPage();
}

add_action('woocommerce_init', 'th_compare_add_action_shop_list');
