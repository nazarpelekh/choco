<?php get_header('empty'); ?>
<body <?php body_class(); ?>>
    <section class="content">

        <div class="welcome__svg">
            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="810" viewBox="0 0 1440 810">
                <defs>
                    <mask id="mask_image">
                        <g>
                            <path fill="#fff" d="M641.912 566.794c28.447-1.074 62.644 1.764 96.458-2.455 58.427-8.208 109.723-29.842 149.211-74.95 57.737-66.127 66.478-144.53 50.07-226.23C915.49 152.691 824.937 87.867 707.01 83.648c-48.153-1.458-96.382 0-144.534 0a32.19 32.19 0 0 0-19.323 3.375c-8.28 5.984-8.127 12.275 0 18.565 4.29 2.64 9.327 3.8 14.339 3.299 14.952 0 22.082 8.208 22.082 23.014v387.253c.077 14.73-6.747 22.554-22.082 23.015a48.588 48.588 0 0 0-4.984 0c-7.591.997-14.875 3.605-14.875 12.504s7.667 11.047 15.335 12.12a81.39 81.39 0 0 0 11.578 0h77.366z"/>
                            <path fill="#000" d="M613.054 313.953c15.935 15.64 45.262 27.685 87.16 33.406 8.653 1.182 11.63-2.608 15.97-2.056.9.114 2.073.258 3.517.432 1.052.127 3.492-.15 3.588.428.096.577-2.192 1.3-3.198 1.92-6.338 3.903-10.292 6.984-11.862 9.244-25.33 36.464-46.996 69.806-48.221 89.87-.87 14.218 2.53 39.495 11.978 41.043 11.426 1.872 22.555-4.453 36.243-21.023 7.318-8.858 16.003-17.386 24.135-32.264 3.9-7.134 7.428-18.272 11.076-26.816 3.948-9.247 8.48-23.314 9.494-34.411.296-3.246 1.8-7.593 4.512-13.043.337-.677.578-2.108 1.067-2.082.49.025.6 1.46.9 2.185 36.497 88.204 70.79 127.218 102.878 117.04-29.65 31.62-69.929 52.861-114.871 58.437-36.446 5.23-73.044 3.41-109.567 3.41-19.625.152-24.777-5.532-24.777-25.998v-86.939V328.2l-.022-14.247zm-.044-43.644c-.025-41.415-.003-82.806.066-124.174.076-24.482 4.395-29.03 28.49-29.03 45.236.38 90.548-2.88 135.026 10.081 66.977 19.46 117.417 73.505 133.055 140.2-28.595-13.951-76.244 1.302-142.946 45.76-.492.326-1.37 1.302-1.477.986-.107-.317.62-1.746.925-2.612 29.971-85.059 30.378-131.917 1.222-140.575-29.023-8.619-44.543 33.912-46.559 127.593-.03 1.39.602 3.228-.08 4.202-.682.974-1.367-.783-2.044-1.17-33.925-19.357-57.47-30.364-70.639-33.019-12.262-2.472-25.42-1.344-35.039 1.758z m301.657 29.783a279.098 279.098 0 0 1-6.761 93.976 189.204 189.204 0 0 1-34.332 70.564c.607-12.048-8.756-32.102-28.82-60.399-8.842-12.47-29.287-31.337-61.336-56.603-.977-.77-3.417-1.612-2.962-2.327.454-.716 3.448-.733 5.137-1.092 40.345-8.588 67.062-14.58 80.15-17.973 19.524-5.063 30.402-7.53 36.6-12.106 4.782-3.531 9.144-8.55 12.324-14.04z"/>
                        </g>
                    </mask>
                </defs>
                <image xlink:href="<?php the_field('background') ?>" x="0" y="0" width="1400" height="800" mask="url(#mask_image)" />
            </svg>
        </div>
        <div class="welcome__button">
            <a href="<?php echo home_url('/home') ?>" class="button">Get Started</a>
        </div>

    </section>
<?php get_footer('empty'); ?>