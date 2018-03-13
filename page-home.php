<?php get_header();
/* Template Name: Home */
?>
<!--    class="index-page"-->


    <div class="scroll-indicator-container js-scroll-down">
        <div class="midnightHeader default">
            <span>Scroll</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="56" viewBox="0 0 24 56">
                <g fill="none" fill-rule="evenodd">
                    <path class="white-stroke" d="M22.61 43.814L12.004 54.421 1.397 43.814l10.607-10.606z"/>
                    <g class="white-fill">
                        <path d="M11.286 48.607l-4.95-4.95.707-.707 4.95 4.95 4.95-4.95.707.707-5.657 5.657-.707-.707z"/>
                        <path d="M12.5.5v48h-1V.5z"/>
                    </g>
                </g>
            </svg>
        </div>
        <div class="midnightHeader on-white">
            <span>Scroll</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="56" viewBox="0 0 24 56">
                <g fill="none" fill-rule="evenodd">
                    <path class="white-stroke" d="M22.61 43.814L12.004 54.421 1.397 43.814l10.607-10.606z"/>
                    <g class="white-fill">
                        <path d="M11.286 48.607l-4.95-4.95.707-.707 4.95 4.95 4.95-4.95.707.707-5.657 5.657-.707-.707z"/>
                        <path d="M12.5.5v48h-1V.5z"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="page-wrapper fullpage">
        <div class="section hero-screen" style="background: url(<?php the_field('bg_int') ?>) no-repeat center/cover">
            <div class="content">
                <div class="centered-info">
	                <?php the_field( 'text_int' ); ?>
                </div>
            </div>
        </div>
        <div class="section" data-midnight="on-white">
            <div class="content with-padding-right">
                <div class="top-info">
	                <?php the_field( 'text_s' ); ?>
                </div>
	            <?php if ($candies = get_field('candies' )) { ?>
                    <div class="img-containers clearfix">
	                    <?php $i = 0; $i++; foreach ($candies as $name) { ?>
		                    <?php if ( $i == 1 ) { ?>
                                <div class="image-block vertical">
                                    <img src="<?php echo $name['image']; ?>" alt="">
                                    <span><?php echo $name['text']; ?></span>
                                </div>
		                    <?php } else { ?>
                                <div class="image-block">
                                    <img src="<?php echo $name['image']; ?>" alt="">
                                    <span><?php echo $name['text']; ?></span>
                                </div>
				            <?php } ?>
	                    <?php } ?>
                    </div>

	            <?php } ?>

            </div>
        </div>
        <div class="section" style="background: url(<?php the_field('bg_box') ?>) no-repeat center/cover">
            <div class="content">
                <div class="centered-info">
	                <?php the_field( 'text_box' ); ?>
                </div>
            </div>
        </div>
        <div class="section" style="background: url(<?php the_field('bg_sub') ?>) no-repeat center/cover">
            <div class="content">
                <div class="centered-info">
	                <?php the_field( 'text_sub' ); ?>
                </div>
            </div>
        </div>
        <div class="section" style="background: url(<?php the_field('bg_blog') ?>) no-repeat center/cover">
            <div class="content">
                <div class="centered-info">
	                <?php the_field( 'text_blog' ); ?>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="left-part js-equal" data-midnight="on-white">
                <div class="content">
                    <div class="top-info">
	                    <?php the_field( 'text_ev' ); ?>
	                    <?php
	                    // the query
	                    $the_query = new WP_Query( array(
		                    'posts_per_page' => 3,
	                    ));
	                    ?>

	                    <?php if ( $the_query->have_posts() ) : ?>
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                <div class="event-block clearfix">
                                    <span class="text-large"><?php echo get_the_date('d.m.y') ?></span>
                                    <p><?php the_title(); ?></p>
                                    <a href="<?php the_permalink() ?>" class="button">Read More</a>
                                    <a href="<?php the_field('tickets') ?>" class="button">Purchase Ticket</a>
                                </div>

                            <?php endwhile; ?>
                            <a href="#" class="button full-width">View All</a>
		                    <?php wp_reset_postdata(); ?>
	                    <?php else : ?>
                            <p><b>There are currently no events on the calendar, please check back later.</b></p>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="right-part js-equal" data-midnight="default" style="background: url(<?php the_field('bg_ev') ?>) no-repeat center/cover"></div>
        </div>
        <div class="section clearfix">
	        <?php if ($event = get_field('event' )) { ?>
                <div class="eventType">
			        <?php foreach ($event as $name) { ?>
                        <div class="link-block" style="background: url(<?php echo $name['bg'] ?>) no-repeat center/cover">
                            <a href="" class="link"></a>
                            <div class="text-block">
                                <h4><?php echo $name['title']; ?></h4>
                                <p class="text-small"><?php echo $name['text']; ?></p>
                            </div>
                        </div>
			        <?php } ?>
                </div>
	        <?php } ?>
        </div>
    </div>
<?php get_footer('empty'); ?>