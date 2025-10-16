<?php
/**
 * Template for displaying search forms
 *
 * @package Hrc_Sallon
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'wp-devs'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'wp-devs'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <?php echo esc_html_x('Search', 'submit button', 'wp-devs'); ?>
    </button>
</form>
