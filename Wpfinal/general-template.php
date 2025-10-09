<?php
/*
Template Name: Car Template
*/
?>
<?php get_header(); ?>

<div id="content" class="site-content car-site">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="car-template">
                    <?php 
                        if( have_posts() ):
                            while( have_posts() ) : the_post();
                    ?>
                        <article class="car-article">
                            <header class="car-header">
                                <h1 class="car-title"><?php the_title(); ?></h1>
                            </header>
                            <div class="car-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php
                            endwhile;
                        else: 
                    ?>
                        <p>No car listings available at the moment. Please check back later!</p>
                    <?php endif; ?>                                
                </div>
            </div>
        </main>
    </div>
</div>

<?php get_footer(); ?>