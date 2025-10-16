<?php
/**
 * The template for displaying single car posts
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-car'); ?>>
            <div class="container">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <?php
                    $year = get_post_meta(get_the_ID(), '_car_year', true);
                    $model = get_post_meta(get_the_ID(), '_car_model', true);
                    if ($year || $model) :
                    ?>
                        <div class="car-subtitle">
                            <?php if ($year) : ?>
                                <span class="car-year"><?php echo esc_html($year); ?></span>
                            <?php endif; ?>
                            <?php if ($model) : ?>
                                <span class="car-model"><?php echo esc_html($model); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="car-single-content">
                    <div class="car-main">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="car-featured-image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <aside class="car-sidebar">
                        <?php
                        $price = get_post_meta(get_the_ID(), '_car_price', true);
                        if ($price) :
                        ?>
                            <div class="car-price-box">
                                <h3><?php _e('Price', 'wp-devs'); ?></h3>
                                <div class="price"><?php echo esc_html($price); ?></div>
                            </div>
                        <?php endif; ?>

                        <div class="car-specifications">
                            <h3><?php _e('Specifications', 'wp-devs'); ?></h3>
                            <ul class="specs-list">
                                <?php
                                $specs = array(
                                    '_car_year' => __('Year', 'wp-devs'),
                                    '_car_model' => __('Model', 'wp-devs'),
                                    '_car_mileage' => __('Mileage', 'wp-devs'),
                                    '_car_fuel_type' => __('Fuel Type', 'wp-devs'),
                                    '_car_transmission' => __('Transmission', 'wp-devs'),
                                    '_car_color' => __('Color', 'wp-devs'),
                                );

                                foreach ($specs as $key => $label) :
                                    $value = get_post_meta(get_the_ID(), $key, true);
                                    if ($value) :
                                ?>
                                    <li>
                                        <strong><?php echo esc_html($label); ?>:</strong>
                                        <span><?php echo esc_html($value); ?></span>
                                    </li>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </ul>
                        </div>

                        <?php
                        $brands = get_the_terms(get_the_ID(), 'car_brand');
                        if ($brands && !is_wp_error($brands)) :
                        ?>
                            <div class="car-taxonomy">
                                <h3><?php _e('Brand', 'wp-devs'); ?></h3>
                                <ul>
                                    <?php foreach ($brands as $brand) : ?>
                                        <li><a href="<?php echo esc_url(get_term_link($brand)); ?>"><?php echo esc_html($brand->name); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php
                        $types = get_the_terms(get_the_ID(), 'car_type');
                        if ($types && !is_wp_error($types)) :
                        ?>
                            <div class="car-taxonomy">
                                <h3><?php _e('Type', 'wp-devs'); ?></h3>
                                <ul>
                                    <?php foreach ($types as $type) : ?>
                                        <li><a href="<?php echo esc_url(get_term_link($type)); ?>"><?php echo esc_html($type->name); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="car-contact">
                            <a href="#contact" class="button"><?php _e('Contact Us', 'wp-devs'); ?></a>
                        </div>
                    </aside>
                </div>

                <nav class="car-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&larr; %title', true, '', 'car_brand'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title &rarr;', true, '', 'car_brand'); ?>
                    </div>
                </nav>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
