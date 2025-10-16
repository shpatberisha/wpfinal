<?php
/**
 * The template for displaying search results
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'wp-devs'),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'search');
            endwhile;

            hrc_sallon_pagination();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
