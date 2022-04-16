<?php
/**
 * Child Theme Theme functions and definitions
 *
 * @package Child Theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0.0
 */

define('CHILD_THEME_CHILD_THEME_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

    wp_enqueue_style('child-theme-theme-css', get_stylesheet_directory_uri().'/style.css', array('astra-theme-css'), CHILD_THEME_CHILD_THEME_VERSION, 'all');
    wp_enqueue_style('featureCss', get_stylesheet_directory_uri().'/assets/feature.css', time(), 'all');

    // Enqueue script files
    wp_enqueue_script('jquery');
    wp_enqueue_script('childFeature', get_stylesheet_directory_uri().'/assets/feature.js', ['jquery'], time(), true);
    wp_localize_script('childFeature', 'dtLocal', [
        'ajaxUrl'        => admin_url('admin-ajax.php'),
        'siteUrl'        => site_url('/'),
        'currencySymbol' => get_woocommerce_currency_symbol()
    ]);
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

add_action('admin_enqueue_scripts', 'adminScripts', 999);

// Load the admin scripts & styles
function adminScripts() {

    // Enqueue script files
    wp_enqueue_script('jquery');
    wp_enqueue_script('adminScript', get_stylesheet_directory_uri().'/assets/admin.js', ['jquery'], time(), true);
    wp_localize_script('adminScript', 'dtLocal', [
        'ajaxUrl' => admin_url('admin-ajax.php')
    ]);
}

// Change Astra's 'This page doesn\'t seem to exist.' message;
add_filter('astra_the_404_page_title', 'my_change_404_title_wording');
/**
 * @param  $notfoundstring
 * @return mixed
 */
function my_change_404_title_wording($notfoundstring) {
    $notfoundstring = ' <img src="https://digitaltechnologia.com/wp-content/uploads/2022/04/404-Page.svg" width="400" height="500"> </br>Page not found </br><p>The page you are looking for is in part of our webiste</p><a href="https://digitaltechnologia.com"> <button class="form-button-404"> Got to home page </button> </a>';
    return $notfoundstring;
}

add_shortcode('dt_add_to_cart_button', 'customCartButton');

/**
 * @param  $atts
 * @return mixed
 */
function customCartButton($atts) {

    $productID = 657;

    $productPrice = wc_get_product($productID)->get_price();

    $cartButton = '<button class="dt_buy_now_button">Buy now</button>';

    $cartButton .= '
    <div class="dt_modal_container">
        <div class="modal_overlay"></div>

        <div class="modal_wrapper">

            <div class="modal_header">
                <div>
                    <h2>Features</h2>
                    <p>Add extra feature to your package</p>
                </div>
                <div class="modal_close">
                    <img src="'.get_stylesheet_directory_uri().'/assets/close.svg'.'" alt="close" width="22" height="22" />
                </div>
            </div>

            <div class="modal_body">
                <div class="modal_content">
                    <div class="servcies">
                        '.listServices($productID).'
                    </div>

                    <div class="total">
                        <label for="service_total">
                            <h3>Total:</h3>
                            <div class="input_box">
                                <span class="currency_symbol">'.get_woocommerce_currency_symbol().'</span>
                                <strong class="cart_total">'.$productPrice.'</strong>
                            </div>
                        </label>
                    </div>

                    <label class="service contract_terms" for="contract_terms">
                        <input type="checkbox" name="contract_terms" id="contract_terms"/>
                        <strong class="contract_text">Contract terms & conditions</strong>
                    </label>

                    <button class="dt_add_to_cart_button" data-id="657">Add to cart</button>
                    <div class="notice_message">Please agree to our terms & conditions</div>
                </div>
            </div>

        </div>
    </div>';

    return $cartButton;
}

/**
 * List the html of meta boxes based on saved values
 * @param array $metaValue
 */
function listServices($productID) {

    $metaValue = get_post_meta($productID, 'dt_services', true);

    $servicesHtml = '';

    if ($metaValue) {
        foreach ($metaValue as $key => $services) {
            $servicesHtml .= '
                <label class="service" for="checkbox_'.$key.'">
                    <input type="checkbox" name="checkbox_'.$key.'" class="service_checkbox" id="checkbox_'.$key.'" value="'.esc_html($services['servicePrice']).'" />
                    <strong>'.esc_html($services['serviceName']).' (£'.esc_html($services['servicePrice']).')</strong>
                </label>
            ';
        }
    }

    return $servicesHtml;
}

/* Add product to cart page */
add_action('wp_ajax_dt_add_to_cart', 'addProductToCart');
add_action('wp_ajax_nopriv_dt_add_to_cart', 'addProductToCart');

// Add the product to cart
function addProductToCart() {
    $output = [];

    if (sanitize_text_field($_POST['action']) !== 'dt_add_to_cart') {
        $output['response'] = 'invalid';
        $output['message'] = 'Action is not valid';
        wp_send_json_error($output, 400);
        wp_die();
    }

    $productID = sanitize_text_field($_POST['productID']);

    global $woocommerce;

    if (get_post_meta($productID, "_stock_status", true) !== 'instock') {
        $output['response'] = 'invalid';
        $output['message'] = 'This product is out of stock';
        wp_send_json_error($output, 400);
        wp_die();
    }

    if ($woocommerce->cart->add_to_cart($productID)) {
        $output['response'] = 'success';
        $output['message'] = 'Your product is added to your cart';
        $output['productPrice'] = wc_get_product($productID)->get_price();
        wp_send_json_success($output, 200);
        wp_die();
    }

    $output['response'] = 'invalid';
    $output['message'] = 'Product couldn\'t be added. Please try again';
    wp_send_json_error($output, 400);
    wp_die();
}

// Add custom data to product cart
/**
 * @param $productID
 */
function addCustomDataToProductCart($productID) {
    $metaValue = get_post_meta($productID, 'dt_services', true);

}

// Add meta box to control the map zoom option
add_action('add_meta_boxes_product', 'registerMetaBox');

function registerMetaBox() {
    add_meta_box(
        'id_product_service_meta',
        'Product Services',
        'metaBoxHTML',
        'product',
        'normal',
        'core'
    );
}

/**
 * @param $post
 */
function metaBoxHTML($post) {
    $metaValue = get_post_meta($post->ID, 'dt_services', true);

    echo '
        <div class="dt_services" style="display: flex;flex-direction: column;gap: 1rem;">
            '.listMetaBoxServices($metaValue).'
        </div>
        <div class="button_section">
            <button class="dt_add_more">Add more</button>
            <button class="dt_save_services" data-id="'.$post->ID.'">Save Services</button>
        </div>
        <style>

            .button_section{
                display: flex;
                margin-top: 1rem;
                justify-content: flex-start;
                align-items: center;
                gap: 1rem;
            }

            .dt_add_more,
            .dt_save_services {
                font-size: 13px;
                font-weight: 400;
                text-transform: capitalize;
                fill: #ffffff;
                color: #ffffff;
                background-color: #2d7cff;
                border-radius: 10px;
                padding: 10px 17px 10px 17px;
                border: 1px solid #2d7cff;
                cursor: pointer;
                transition: all ease-in-out 200ms;
                font-weight: bold;
                text-transform: uppercase;
            }

            .dt_add_more:hover,
            .dt_add_more:focus,
            .dt_save_services:hover,
            .dt_save_services:focus {
                color: #2d7cff;
                background-color: #02010100;
                border-color: #2d7cff;
            }

            .dt_services .service{
                position: relative;
            }

            .dt_services .modal_close{
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }
        </style>
   ';
}

/**
 * List the html of meta boxes based on saved values
 * @param array $metaValue
 */
function listMetaBoxServices($metaValue) {
    $servicesHtml = '';

    if ($metaValue) {
        foreach ($metaValue as $key => $services) {
            $servicesHtml .= '
                <div class="service" style="padding: 1rem; border: 1px solid #000; display: flex; flex-direction: column">
                    <div class="modal_close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22">
                        <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                        </svg>
                    </div>
                    <label for="service_name_'.$key.'">
                        <h4 style="margin-bottom: 6px; margin-top: 0;">Service Title:</h4>
                        <input type="text" name="service_name_'.$key.'" id="service_name_'.$key.'" value="'.esc_html($services['serviceName']).'" class="service_name"/>
                    </label>
                    <br/>
                    <label for="service_price_'.$key.'">
                        <h4 style="margin-bottom: 6px; margin-top: 0;">Service Price:</h4>
                        <input type="number" name="service_price_'.$key.'" id="service_price_'.$key.'" value="'.esc_html($services['servicePrice']).'" class="service_price"/>
                    </label>
                </div>
            ';
        }
    }

    return $servicesHtml;
}

/**
 * @param  array   $NonSanitizedData
 * @return mixed
 */
function sanitizeData(array $NonSanitizedData) {
    $sanitizedData = null;

    $sanitizedData = array_map(function ($data) {
        if (gettype($data) == 'array') {
            return sanitizeData($data);
        } else {
            return sanitize_text_field($data);
        }
    }, $NonSanitizedData);

    return $sanitizedData;
}

/* Add product to cart page */
add_action('wp_ajax_dt_save_services', 'saveServices');
add_action('wp_ajax_nopriv_dt_save_services', 'saveServices');

// Save the DT product services into meta fields
function saveServices() {
    $output = [];

    if (sanitize_text_field($_POST['action']) !== 'dt_save_services') {
        $output['response'] = 'invalid';
        $output['message'] = 'Action is not valid';
        wp_send_json_error($output, 400);
        wp_die();
    }

    $postID = sanitize_text_field($_POST['postID']);

    $services = $_POST['services'] ? sanitizeData($_POST['services']) : [];

    if (!$postID) {
        $output['response'] = 'invalid';
        $output['message'] = 'Product ID is empty';
        wp_send_json_error($output, 400);
        wp_die();
    }

    update_post_meta($postID, 'dt_services', $services);

    $output['response'] = 'success';
    $output['message'] = 'Service data saved successfully';
    wp_send_json_success($output, 200);
    wp_die();

    $output['response'] = 'invalid';
    $output['message'] = 'Product couldn\'t be added. Please try again';
    wp_send_json_error($output, 400);
    wp_die();
}