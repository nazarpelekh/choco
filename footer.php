    <div class="footer">
        <div class="content">
	        <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul class="footer-menu">%3$s</ul>', 'theme_location'  => 'foot_menu')); ?>

            <div class="subscribe-container">
                <span class="text-bold">Join our Mailing List</span>
                <div class="input-container">
<!--	                --><?php //echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]') ?>
                    <input type="email" placeholder="Email Address">
                    <button type="submit" class="button">Join</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php wp_footer(); ?>
</html>
