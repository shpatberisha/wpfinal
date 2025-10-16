<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Hrc_Sallon
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
