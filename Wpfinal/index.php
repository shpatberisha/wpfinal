<?php get_header(); ?>

<div id="content" class="site-content carsallon-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <h1>Welcome to Carsallon Blog</h1>
            <p class="intro-text">Latest car news, reviews, and insights from the world of automobiles.</p>

            <div class="container carsallon-container">
                <div class="blog-items carsallon-blog-items">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                               
                                get_template_part( 'parts/content', get_post_format() );
                            endwhile;
                    ?>
                        <div class="wpdevs-pagination carsallon-pagination">
                            <div class="pages new">
                                <?php previous_posts_link( '<< Newer Posts' ); ?>
                            </div>
                            <div class="pages old">
                                <?php next_posts_link( 'Older Posts >>' ); ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <p>No car articles found at the moment. Please check back soon!</p>
                    <?php endif; ?>                                
                </div>

                <?php get_sidebar();  ?>

            </div>

            <div class="wpdevs-slider carsallon-slider">
                
                <h2>Featured Cars</h2>
                <div class="slider-wrapper">
                    <div class="slide">Car 1 - Coming Soon</div>
                    <div class="slide">Car 2 - Coming Soon</div>
                    <div class="slide">Car 3 - Coming Soon</div>
                </div>
            </div>

        </main>
    </div>
</div>

<?php get_footer(); ?>