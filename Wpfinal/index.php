<?php
/**
 * The main template file
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            ?>
            <div class="posts-wrapper">
                <?php
                // Start the Loop
                while (have_posts()) :
                    the_post();
                    
                    // Include the Post-Type-specific template for the content
                    get_template_part('template-parts/content', get_post_type());

                endwhile;
                ?>
            </div>
            <?php

            // Display pagination
            hrc_sallon_pagination();

        else :

            // If no content, include the "No posts found" template
            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
