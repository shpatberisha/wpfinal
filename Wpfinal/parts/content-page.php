<article class="car-single-post">


    <header class="car-header">
        <h1 class="car-title"><?php the_title(); ?></h1>
    </header>

 
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="car-featured-image">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
    <?php endif; ?>

    <section class="car-specs">
        <h2>Car Specifications</h2>
        <ul>
            <?php if( get_field('car_price') ): ?>
                <li><strong>Price:</strong> <?php the_field('car_price'); ?></li>
            <?php endif; ?>
            <?php if( get_field('car_mileage') ): ?>
                <li><strong>Mileage:</strong> <?php the_field('car_mileage'); ?> km</li>
            <?php endif; ?>
            <?php if( get_field('car_year') ): ?>
                <li><strong>Year:</strong> <?php the_field('car_year'); ?></li>
            <?php endif; ?>
            <?php if( get_field('car_engine') ): ?>
                <li><strong>Engine:</strong> <?php the_field('car_engine'); ?></li>
            <?php endif; ?>
        </ul>
    </section>


    <div class="car-content">
        <?php the_content(); ?>
    </div>

  
    <?php wp_link_pages( array(
        'before' => '<div class="page-links"><strong>Pages:</strong>',
        'after'  => '</div>',
    ) ); ?>

</article>