<?php
/**
 * The template for displaying the footer
 *
 * @package Hrc_Sallon
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>

            <div class="site-info">
                <p>
                    <?php
                    printf(
                        esc_html__('&copy; %1$s %2$s. All rights reserved.', 'wp-devs'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                </p>
                <p>
                    <?php
                    printf(
                        esc_html__('Powered by %1$s | Theme: %2$s by %3$s', 'wp-devs'),
                        '<a href="https://wordpress.org/">WordPress</a>',
                        'Hrc Sallon',
                        '<a href="https://website.com/wp-devs">Shpat Berisha</a>'
                    );
                    ?>
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
