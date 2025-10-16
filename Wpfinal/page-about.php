<?php
/**
 * Template Name: About Page
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="page-content">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                </article>

                 About Stats Section 
                <section class="about-stats">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label"><?php esc_html_e('Cars Sold', 'wp-devs'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">10+</div>
                            <div class="stat-label"><?php esc_html_e('Years Experience', 'wp-devs'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label"><?php esc_html_e('Customer Satisfaction', 'wp-devs'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label"><?php esc_html_e('Car Brands', 'wp-devs'); ?></div>
                        </div>
                    </div>
                </section>

                 Our Mission Section 
                <section class="mission-section">
                    <h2><?php esc_html_e('Our Mission', 'wp-devs'); ?></h2>
                    <p><?php esc_html_e('At Hrc Sallon, we are committed to providing our customers with the finest selection of quality vehicles. Our mission is to make car buying easy, transparent, and enjoyable. We believe in building lasting relationships with our customers through exceptional service and honest business practices.', 'wp-devs'); ?></p>
                </section>

                 Our Values Section 
                <section class="values-section">
                    <h2><?php esc_html_e('Our Values', 'wp-devs'); ?></h2>
                    <div class="values-grid">
                        <div class="value-item">
                            <h3><?php esc_html_e('Integrity', 'wp-devs'); ?></h3>
                            <p><?php esc_html_e('We conduct business with honesty and transparency in every transaction.', 'wp-devs'); ?></p>
                        </div>
                        <div class="value-item">
                            <h3><?php esc_html_e('Quality', 'wp-devs'); ?></h3>
                            <p><?php esc_html_e('We ensure every vehicle meets our high standards of excellence.', 'wp-devs'); ?></p>
                        </div>
                        <div class="value-item">
                            <h3><?php esc_html_e('Customer Focus', 'wp-devs'); ?></h3>
                            <p><?php esc_html_e('Your satisfaction is our top priority in everything we do.', 'wp-devs'); ?></p>
                        </div>
                    </div>
                </section>

            <?php
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
