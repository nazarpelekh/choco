<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$terms = get_the_terms( $product->id, 'product_cat' );

$classes = '';
$co = count($terms); $i = $c = 1;
if($terms) :
	foreach($terms as $cat){
		$classes .= ' ' . $cat->slug;
	}
endif;

$price     = get_post_meta( get_the_ID(), '_regular_price', true );
$regular_price = wc_price( $price );

$s_price     = get_post_meta( get_the_ID(), '_sale_price', true );
$sale_price = wc_price( $s_price );

?>

<div class="product-container<?php echo $product->is_on_sale()?' sale':''; ?><?php echo $classes; ?>">
    <div class="product-container-image" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>) center/cover"></div>
    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<!--    <span class="price">--><?php //echo $product->get_price_html(); ?><!--</span>-->
<!--    <span class="price">--><?php //do_action('woocommerce_get_price_html'); ?><!--</span>-->
<!--    <span class="price">--><?php //echo $product->get_sale_price() ?><!--</span>-->
	<?php if ($product->get_sale_price()) {
		echo '<span class="price old">'.$product->get_sale_price().'.00</span>
            <span>|</span>
            <span class="quantity">12 piece Box</span>
            <span class="note">Now '.$product->get_regular_price().'.00</span>';
	} else {
	    echo '<span class="price">'.$product->get_regular_price().'.00</span>
            <span>|</span>
            <span class="quantity">12 piece Box</span>';
    } ?>
	<?php bbloomer_display_sold_out_loop_woocommerce() ?>
</div>




