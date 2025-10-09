<?php get_header(); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php 
            // Show the archive title for the crasallon post type
            if ( is_post_type_archive( 'crasallon' ) ) {
                post_type_archive_title( '<h1 class="archive-title">', '</h1>' );
                echo '<div class="archive-description">' . get_post_type_object('crasallon')->description . '</div>';
            } else {
                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
            }
            ?>

            <div class="container">
                <div class="archive-items">
                    <?php 
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();

                            // Load specific template part for crasallon, fallback to default content
                            if ( get_post_type() === 'crasallon' ) {
                                get_template_part( 'parts/content', 'crasallon' );
                            } else {
                                get_template_part( 'parts/content' );
                            }

                        endwhile;
                    ?>
                        <div class="wpdevs-pagination">
                            <div class="pages new">
                                <?php previous_posts_link( '<< Newer posts' ); ?>
                            </div>
                            <div class="pages old">
                                <?php next_posts_link( 'Older posts >>' ); ?>
                            </div>
                        </div>
                    <?php
                    else :
                    ?>
                        <p>Nothing yet to be displayed!</p>
                    <?php endif; ?>                                
                </div>
                <?php get_sidebar(); ?>
            </div>

        </main>
    </div>
</div>

<?php get_footer(); ?>
