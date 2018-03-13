<?php

add_theme_support('woocommerce');

//cart item return custom size
function woo_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {
     $product = get_product( $cart_item['product_id'] );
    return $product->get_image( 'shop_catalog' );
}
add_filter( 'woocommerce_cart_item_thumbnail', 'woo_cart_item_thumbnail', 10, 3 );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    minicart_tpl();
    $fragments['.cart-contents'] = '<div class="cart-contents">'.ob_get_clean().'</div>';
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

//custom mini-cart
function minicart_tpl(){ ?>
    <a class="minicart-icon" href="<?php echo WC()->cart->get_cart_url(); ?>">
        <i class="icon_cart_alt"></i>
        <?php echo WC()->cart->cart_contents_count !== 0?'<span>'.WC()->cart->cart_contents_count.'</span>':''; ?>
    </a>
    <div class="cc_cart">
        <?php
        if(WC()->cart->cart_contents) {
            $_pf = new WC_Product_Factory();
            echo '<table class="shop_table shop_table_mini"><thead><th colspan="2">Product</th><th colspan="2">Price</th></thead><tbody>';
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $pid = $cart_item['product_id'];
            ?>
        <tr>
            <td class="product-thumbnail">
                <a href="<?php echo get_permalink($pid); ?>"><?php echo has_post_thumbnail($pid)?get_the_post_thumbnail($pid, 'shop_thumbnail'):'<img src="'.woocommerce_placeholder_img_src().'" alt="" />'; ?></a>
            </td>
            <td class="product-name">
               <?php
                    if ( ! $_product->is_visible() ) {
                        echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                    } else {
                        echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
                    }
                    // Meta data
                    echo WC()->cart->get_item_data( $cart_item );
                ?>
            </td>
            <td class="product-price">
                <span><?php echo $_product->get_price_html(); ?></span>
            </td>
            <td class="product-remove">
                <span data-wooremove="<?php echo $pid; ?>" class="icon_close"></span>
            </td>
        </tr>
        <?php }
            echo '</tbody></table>'
                .'<div class="cc_totals">'
                .'<a href="'.get_permalink(CART_ID).'" class="button">Manage Cart</a>'
                .'<a href="?clear-cart" class="button">Clear Cart</a>'
                .'<div class="cc_total">Total: '. WC()->cart->get_cart_total().'</div>'
                .'<a href="' . get_permalink(CHECKOUT_ID) . '" class="button">Checkout →</a>';
        } else {
            echo '<div class="cc_empty">Your cart is empty. <br /><a href="' . site_url('/#shopping') . '">Go to store</a> and buy something.</div>';
        } ?>
    </div>
<?php }

//remove product from minicart
function woo_product_remover(){
    extract($_POST);
    if(isset($product_id) && $product_id !== 'all') {
        $prod_to_remove = intval($product_id);
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $prod_id = $cart_item['product_id'];
            if( $prod_to_remove == $prod_id ) {
                WC()->cart->set_quantity( $cart_item_key, 0, true  );
                break;
            }
        }
    } else {
        global $woocommerce;
        $woocommerce->cart->empty_cart();
    }
    echo minicart_tpl();
    wp_die();
}
add_action('wp_ajax_woo_product_remover', 'woo_product_remover');
add_action('wp_ajax_nopriv_woo_product_remover', 'woo_product_remover');

//woocommerce ajax
function woo_product_list( $firstload = array() ) {

    if (defined('DOING_AJAX') && DOING_AJAX) {
        extract($_POST);
        $pager = isset($pager) ? $pager : 1;
    } else {
        extract($firstload);
        $pager = 1;
    }

    $grid_args = array(
        'post_type'      => 'product',
        'posts_per_page' => POSTS_PER_PAGE,
        'post_status'    => 'publish',
        'paged'          => $pager,
        'meta_query'     => array(
            array(
                'key' => '_visibility',
                'value' => array( 'catalog', 'visible' ),
                'compare' => 'IN'
            )
        )
    );

//    if(isset($term_id) && $term_id !== 0) {
//        $grid_args['tax_query'] = array(
//            'taxonomy' => 'product_cat',
//            'field' => 'id',
//            'terms' => $term_id
//        );
//    }

    if(is_tax('product_cat') || is_tax('product_tag')) {
        $grid_args['posts_per_page'] = -1;
    }

    if (isset($issearch) && trim($issearch) && mb_strlen(trim($issearch)) > 2) {
        $grid_args['s'] = $issearch;
    }

    if(isset($sale)) {
        $grid_args['meta_query'] = WC()->query->get_meta_query();
        $grid_args['post__in']   = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
    }

    $grid_items = new WP_Query( $grid_args );

    $maxpages = $grid_items->max_num_pages;

    if($grid_items->have_posts()) {
        while($grid_items->have_posts()) {
            $grid_items->the_post();
            wc_get_template_part( 'content', 'product' );
        }
        if ($maxpages > $pager) { ?>
            <div class="grid-item woo-loadmore">
                <a href="" class="button" data-pager="<?php echo $pager ? $pager + 1 : 2; ?>" data-max="<?php echo $maxpages; ?>">Load more</a>
                <?php echo get_loader(); ?>
            </div>
        <?php }
    }

    if (defined('DOING_AJAX') && DOING_AJAX) {
        exit();
    }
}

add_action('wp_ajax_woo_product_list', 'woo_product_list');
add_action('wp_ajax_nopriv_woo_product_list', 'woo_product_list');

//get smallest price of product
function wpa_variation_price_min( $price, $product ) {

    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice ) {
        $price = '<ins>' . $price . '</ins><del>' . $saleprice . '</del>';
    }
    return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'wpa_variation_price_min', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wpa_variation_price_min', 10, 2 );

//woo rename tabs
function woo_rename_tabs( $tabs ) {
    if(isset($tabs['additional_information'])) {
       $tabs['additional_information']['title'] = __( 'Additional' );
    }
    if(isset($tabs['reviews'])) {
       $tabs['reviews']['title'] = __( 'Reviews' );
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );

function custom_override_checkout_fields( $fields ) {
    foreach($fields['billing'] as $key => $val){
        if(isset($val['label'])) {
            $fields['billing'][$key]['placeholder'] = $val['label'];
        }
        $fields['billing'][$key]['clear'] = null;
        $fields['billing'][$key]['label'] = null;
    }
    foreach($fields['shipping'] as $key => $val){
        if(isset($val['label'])) {
            $fields['shipping'][$key]['placeholder'] = $val['label'];
        }
        $fields['shipping'][$key]['clear'] = null;
        $fields['shipping'][$key]['label'] = null;
    }
    $fields['account']['account_password']['label']           =
    $fields['order']['order_comments']['label']               = null;
    $fields['billing']['billing_city']['placeholder']         = __('Town/City');
    $fields['billing']['billing_state']['placeholder']        = __('State');
     return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
