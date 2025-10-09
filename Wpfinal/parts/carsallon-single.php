<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php 
        // Featured Image
        if ( has_post_thumbnail() ) : ?>
            <div class="carsallon-featured-image">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>

        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <span class="posted-on">Posted on <?php echo get_the_date(); ?></span> |
            <span class="byline">By <?php the_author_posts_link(); ?></span>
        </div>

        <?php if ( has_category() ) : ?>
            <div class="entry-categories">
                Categories: <?php the_category( ', ' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( has_tag() ) : ?>
            <div class="entry-tags">
                Tags: <?php the_tags( '', ', ' ); ?>
            </div>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php 
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'your-textdomain' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        // Optional: Add any footer info for carsallon posts here, like edit link
        edit_post_link(
            sprintf(
                /* translators: %s: Post title */
                __( 'Edit %s', 'your-textdomain' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->

</article>
