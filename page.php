<?php get_header(); ?>
<section class="shop-page inside-page">

<div class="page-wrapper">
    <div class="section">
        <div class="content">
            <h4><?php echo $wp_query->get_queried_object()->name ?></h4>
            <div class="with-right-menu">
                <div class="categories">
                    <div class="hide-md js-close-categories"><span class="close big"></span></div>
                    <p class="text-bold">Product Type</p>
                    <?php $orderby = 'name';
	                $order = 'asc';
	                $hide_empty = false ;
	                $cat_args = array(
		                'orderby'    => $orderby,
		                'order'      => $order,
		                'hide_empty' => $hide_empty,
	                );

	                $product_categories = get_terms( 'product_cat', $cat_args );

                    $current_category = $wp_query->get_queried_object()->term_id;

	                if( !empty($product_categories) ){
		                echo '<ul>';
		                foreach ($product_categories as $key => $category) {
		                    if($current_category == $category->term_id){
			                    echo '<li class="active">';
			                    echo '<a href="'.get_term_link($category).'" >';
			                    echo $category->name;
			                    echo '</a>';
			                    echo '</li>';
                            } else {
			                    echo '<li>';
			                    echo '<a href="'.get_term_link($category).'" >';
			                    echo $category->name;
                                echo $category->id;
			                    echo '</a>';
			                    echo '</li>';
                            }
		                }
		                echo '</ul>';
	                } ?>
                </div>
                <div class="filters-container clearfix">
	                <?php include 'parts/search.php' ?>
	                <?php do_action( 'woocommerce_default_catalog_orderby' );  ?>
                    <div class="select-container">
                        <div class="custom-select" style="width:132px;">
                            <select>
                                <option value="0">Sort By</option>
                                <option value="1">Popularity</option>
                                <option value="2">Price low to high</option>
                                <option value="3">Price high to low</option>
                            </select>
                        </div>
                    </div>
                    <div class="hide-md categories-mobile clearfix">
                        <p class="text-bold text-large">All Categories</p>
                        <div class="open-selection js-open-categories">
                            <img src="assets/images/filter.svg" alt="">
                            <span class="text-small text-bold text-uppercase">FILTER</span>
                        </div>
                    </div>
                </div>
                <div class="product-line clearfix">
	                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		                <?php the_content(); ?>
	                <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>




<?php get_footer(); ?>

