<?php 
if ( is_singular('carsallon') || is_post_type_archive('carsallon') ) {
    if ( is_active_sidebar( 'sidebar-carsallon' ) ) : ?>
        <aside class="sidebar">
            <?php dynamic_sidebar( 'sidebar-carsallon' ); ?>
        </aside>
    <?php endif;
} else {
    if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
        <aside class="sidebar">
            <?php dynamic_sidebar( 'sidebar-blog' ); ?>
        </aside>
    <?php endif;
}
?>
