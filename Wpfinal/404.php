<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'wp-devs'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'wp-devs'); ?></p>

                <?php get_search_form(); ?>

                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'wp-devs'); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ));
                        ?>
                    </ul>
                </div>

                <div class="widget widget_archive">
                    <h2 class="widget-title"><?php esc_html_e('Archives', 'wp-devs'); ?></h2>
                    <ul>
                        <?php
                        wp_get_archives(array(
                            'type'  => 'monthly',
                            'limit' => 12,
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
