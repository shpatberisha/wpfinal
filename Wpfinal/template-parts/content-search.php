<?php
/**
 * Template part for displaying search results
 *
 * @package Hrc_Sallon
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                hrc_sallon_posted_on();
                hrc_sallon_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
            <?php esc_html_e('Read More', 'wp-devs'); ?>
        </a>
    </footer>
</article>
