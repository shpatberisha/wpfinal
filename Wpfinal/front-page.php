<?php
/**
 * Front Page Template
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
     Hero Section 
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
            <p class="hero-description">
                <?php 
                $description = get_bloginfo('description');
                echo $description ? esc_html($description) : esc_html__('Discover Your Dream Car Today', 'wp-devs');
                ?>
            </p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_post_type_archive_link('car')); ?>" class="btn btn-primary">
                    <?php esc_html_e('Browse Cars', 'wp-devs'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">
                    <?php esc_html_e('Contact Us', 'wp-devs'); ?>
                </a>
            </div>
        </div>
    </section>

     Featured Cars Section 
    <section class="featured-cars-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Featured Cars', 'wp-devs'); ?></h2>
            
            <?php
            $featured_cars = new WP_Query(array(
                'post_type' => 'car',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($featured_cars->have_posts()) :
            ?>
                <div class="cars-grid">
                    <?php while ($featured_cars->have_posts()) : $featured_cars->the_post(); ?>
                        <article class="car-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="car-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('hrc-sallon-featured'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="car-content">
                                <h3 class="car-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="car-meta">
                                    <?php
                                    $year = get_post_meta(get_the_ID(), '_car_year', true);
                                    $price = get_post_meta(get_the_ID(), '_car_price', true);
                                    $mileage = get_post_meta(get_the_ID(), '_car_mileage', true);
                                    ?>
                                    
                                    <?php if ($price) : ?>
                                        <span class="car-price">$<?php echo esc_html(number_format($price)); ?></span>
                                    <?php endif; ?>
                                    
                                    <div class="car-details">
                                        <?php if ($year) : ?>
                                            <span class="car-year"><?php echo esc_html($year); ?></span>
                                        <?php endif; ?>
                                        
                                        <?php if ($mileage) : ?>
                                            <span class="car-mileage"><?php echo esc_html($mileage); ?> km</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                    <?php esc_html_e('View Details', 'wp-devs'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <div class="view-all-cars">
                    <a href="<?php echo esc_url(get_post_type_archive_link('car')); ?>" class="btn btn-primary">
                        <?php esc_html_e('View All Cars', 'wp-devs'); ?>
                    </a>
                </div>
            <?php
                wp_reset_postdata();
            else :
            ?>
                <p><?php esc_html_e('No cars available at the moment.', 'wp-devs'); ?></p>
            <?php endif; ?>
        </div>
    </section>

     Why Choose Us Section 
    <section class="features-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Why Choose Us', 'wp-devs'); ?></h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🚗</div>
                    <h3><?php esc_html_e('Quality Cars', 'wp-devs'); ?></h3>
                    <p><?php esc_html_e('We offer only the best quality vehicles from trusted brands.', 'wp-devs'); ?></p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3><?php esc_html_e('Best Prices', 'wp-devs'); ?></h3>
                    <p><?php esc_html_e('Competitive pricing with flexible payment options.', 'wp-devs'); ?></p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔧</div>
                    <h3><?php esc_html_e('Expert Service', 'wp-devs'); ?></h3>
                    <p><?php esc_html_e('Professional support and maintenance services.', 'wp-devs'); ?></p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
