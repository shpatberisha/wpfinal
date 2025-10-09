<?php get_header(); ?>

<div id="primary">
    <div id="main">
        <div class="container">

            <?php 
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();

                    // Load a custom template part for carsallon single posts, fallback to default single content
                    if ( get_post_type() === 'carsallon' ) {
                        get_template_part( 'parts/content', 'carsallon-single' );
                    } else {
                        get_template_part( 'parts/content', 'single' );
                    }
                    ?>

                    <div class="wpdevs-pagination">
                        <div class="pages next">
                            <?php next_post_link( '&laquo; %link' ); ?>
                        </div>
                        <div class="pages previous">
                            <?php previous_post_link( '%link &raquo;' ); ?>  
                        </div>
                    </div>

                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                endwhile;
            endif;
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
