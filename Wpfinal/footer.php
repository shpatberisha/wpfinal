<footer class="site-footer">
    <div class="container">
        <div class="copyright">
            <?php 
            if ( is_singular('crasallon') || is_post_type_archive('crasallon') ) {
                // Custom copyright for crasallon
                echo get_theme_mod( 'set_copyright_crasallon', '© Crasallon - All Rights Reserved' );
            } else {
                // Default copyright
                echo get_theme_mod( 'set_copyright', 'Copyright X - All Rights Reserved' );
            }
            ?>
        </div>

        <nav class="footer-menu">
            <?php 
            if ( is_singular('crasallon') || is_post_type_archive('crasallon') ) {
                // Use a special footer menu for crasallon, fallback to default if not set
                wp_nav_menu( array(
                    'theme_location' => 'crasallon_footer_menu',
                    'depth' => 1,
                    'fallback_cb' => function() {
                        wp_nav_menu( array(
                            'theme_location' => 'wp_devs_footer_menu',
                            'depth' => 1
                        ));
                    }
                ));
            } else {
                // Default footer menu
                wp_nav_menu( array( 'theme_location' => 'wp_devs_footer_menu', 'depth' => 1 ) );
            }
            ?>
        </nav>
    </div>
</footer>

</div> <!-- Closing wrapper div -->
<?php wp_footer(); ?>
</body>
</html>
