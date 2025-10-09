<article id="post-<?php the_ID(); ?>" <?php post_class('carsallon-article'); ?>>

    <!-- Article Header -->
    <header class="carsallon-article-header">
        <h2 class="carsallon-article-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="carsallon-meta">
            <span class="carsallon-date">📅 <?php echo get_the_date(); ?></span>
            <span class="carsallon-author">👤 By <?php the_author_posts_link(); ?></span>

            <?php if ( has_category() ) : ?>
                <div class="carsallon-categories">
                    🚗 In: <?php the_category(', '); ?>
                </div>
            <?php endif; ?>

            <?php if ( has_tag() ) : ?>
                <div class="carsallon-tags">
                    🏷️ Tags: <?php the_tags('', ', '); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </header>

    <!-- Article Content -->
    <div class="carsallon-article-excerpt">
        <?php the_excerpt(); ?>
    </div>

    <!-- Read More CTA -->
    <div class="carsallon-readmore">
        <a href="<?php the_permalink(); ?>" class="read-more-btn">Read Full Article →</a>
    </div>

</article>