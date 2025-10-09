<?php get_header(); ?>


<div id="car-slider-container">
    <div id="car-slider-inner">
        <div id="car-slider-images">
            <div class="car-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/audi.jpg" alt="Car 1">
            </div>
            <div class="car-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/bmw.jpg" alt="Car 2">
            </div>
            <div class="car-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/mercedes.jpg" alt="Car 3">
            </div>
        </div>
        <div id="slider-overlay">
            <div id="slider-left" class="slider-button" onclick="onLeftButton()">&#10094;</div>
            <div id="slider-right" class="slider-button" onclick="onRightButton()">&#10095;</div>
        </div>
    </div>
</div>

<div class="slider-dots" style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

           
            <section class="hero">
                <h1>Welcome to HRCsallon</h1>
                <p>Your trusted source for car reviews, services, and the latest auto industry news.</p>
            </section>

            
            <section class="car-services">
                <h2>Our Services</h2>
                <div class="container">
                    <div class="services-item">
                        <?php if ( is_active_sidebar( 'services-1' ) ) { dynamic_sidebar( 'services-1' ); } ?>
                    </div>
                    <div class="services-item">
                        <?php if ( is_active_sidebar( 'services-2' ) ) { dynamic_sidebar( 'services-2' ); } ?>
                    </div>
                    <div class="services-item">
                        <?php if ( is_active_sidebar( 'services-3' ) ) { dynamic_sidebar( 'services-3' ); } ?>
                    </div>
                </div>
            </section>

           
            <section class="latest-car-news">
                <h2>Latest in Automotive News</h2>
                <div class="container">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                       
                        'category_name' => 'car-news,car-reviews'
                    );

                    $car_news = new WP_Query( $args );

                    if ( $car_news->have_posts() ) :
                        while ( $car_news->have_posts() ) : $car_news->the_post();
                            get_template_part( 'parts/content', 'latest-news' );
                        endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>No car news or reviews available right now.</p>
                    <?php endif; ?>
                </div>
            </section>

            
            <section class="carsallon-featured-slider">
                <h2>Featured Cars</h2>
                <div class="slider-wrapper">
                    <div class="car-slide">audi</div>
                    <div class="car-slide">bmw</div>
                    <div class="car-slide">mersedes</div>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer(); ?>