<article class="cars-news-post">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="car-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="car-news-content">
        <h3 class="car-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="car-meta-info">
            <p>
                <strong>Posted by:</strong> <?php the_author_posts_link(); ?>
                <span class="divider">|</span>
                <strong>Date:</strong> <?php echo get_the_date(); ?>
            </p>
            <?php if ( has_category() ) : ?>
                <p><strong>Categories:</strong> <?php the_category( ', ' ); ?></p>
            <?php endif; ?>
            <?php if ( has_tag() ) : ?>
                <p><strong>Tags:</strong> <?php the_tags( '', ', ' ); ?></p>
            <?php endif; ?>
        </div>

        <div class="car-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="car-read-more">Read More &raquo;</a>
    </div>
</article>


