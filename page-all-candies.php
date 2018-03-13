<?php get_header();
/* Template Name: All Candies */
?>

<div class="page-wrapper">
	<div class="section hero-screen">
		<div class="content">
			<h2><?php the_field( 'title' ); ?></h2>
		</div>
	</div>
	<div class="section">
		<div class="content">
			<div class="clearfix">
				<?php include 'parts/search.php' ?>
            </div>

			<?php $args = array(
				'number'     => $number,
				'orderby'    => 'menu_order',
				'order'      => 'ASC',
				'hide_empty' => $hide_empty,
				'include'    => $ids
			);
			$product_categories = get_terms( 'product_cat', $args );
			$count = count($product_categories);
			if ( $count > 0 ){
				foreach ( $product_categories as $product_category ) { ?>
                    <div class="popular-section">
                        <span class="text-large text-bold section-title"><?php echo $product_category->name ?></span>
                        <div class="product-line clearfix">
                            <?php
                            $args = array(
                                'posts_per_page' => 4,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'slug',
                                        // 'terms' => 'white-wines'
                                        'terms' => $product_category->slug
                                    )
                                ),
                                'post_type' => 'product',
                                'orderby' => 'menu_order,'
                            );
                            $products = new WP_Query( $args );
                            while ( $products->have_posts() ) {
                                $products->the_post();
                                ?>
                                <div class="product-container">
                                    <div class="product-container-image" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>) center/cover"></div>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <span class="price"><?php echo $price = get_post_meta( get_the_ID(), '_regular_price', true); ?>.00</span>
                                    <span>|</span>
                                    <span class="quantity">12 piece Box</span>
                                </div>
                                <?php
                            }?>
					    </div>
                        <a href="<?php echo get_term_link( $product_category ); ?>" class="button">View All</a>
                    </div>
				<?php }
			} ?>

			<div class="clearfix">
				<?php include 'parts/posters.php'?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
