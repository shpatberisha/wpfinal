<?php
/**
 * The template for displaying car archive pages
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                if (is_tax('car_brand')) {
                    single_term_title();
                } elseif (is_tax('car_type')) {
                    single_term_title();
                } else {
                    _e('Our Cars', 'wp-devs');
                }
                ?>
            </h1>
            <?php
            $term_description = term_description();
            if (!empty($term_description)) {
                echo '<div class="taxonomy-description">' . $term_description . '</div>';
            }
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="cars-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('car-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="car-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('hrc-sallon-featured'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="car-content">
                            <header class="car-header">
                                <h2 class="car-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <?php
                                $year = get_post_meta(get_the_ID(), '_car_year', true);
                                $model = get_post_meta(get_the_ID(), '_car_model', true);
                                if ($year || $model) :
                                ?>
                                    <div class="car-meta-info">
                                        <?php if ($year) : ?>
                                            <span class="car-year"><?php echo esc_html($year); ?></span>
                                        <?php endif; ?>
                                        <?php if ($model) : ?>
                                            <span class="car-model"><?php echo esc_html($model); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="car-details">
                                <?php
                                $price = get_post_meta(get_the_ID(), '_car_price', true);
                                $mileage = get_post_meta(get_the_ID(), '_car_mileage', true);
                                $fuel_type = get_post_meta(get_the_ID(), '_car_fuel_type', true);
                                $transmission = get_post_meta(get_the_ID(), '_car_transmission', true);
                                ?>

                                <?php if ($price) : ?>
                                    <div class="car-price"><?php echo esc_html($price); ?></div>
                                <?php endif; ?>

                                <ul class="car-specs">
                                    <?php if ($mileage) : ?>
                                        <li><strong><?php _e('Mileage:', 'wp-devs'); ?></strong> <?php echo esc_html($mileage); ?></li>
                                    <?php endif; ?>
                                    <?php if ($fuel_type) : ?>
                                        <li><strong><?php _e('Fuel:', 'wp-devs'); ?></strong> <?php echo esc_html($fuel_type); ?></li>
                                    <?php endif; ?>
                                    <?php if ($transmission) : ?>
                                        <li><strong><?php _e('Transmission:', 'wp-devs'); ?></strong> <?php echo esc_html($transmission); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <div class="car-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="car-link">
                                <?php _e('View Details', 'wp-devs'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php hrc_sallon_pagination(); ?>

        <?php else : ?>
            <div class="no-results">
                <h2><?php _e('No cars found', 'wp-devs'); ?></h2>
                <p><?php _e('Sorry, no cars match your criteria.', 'wp-devs'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
