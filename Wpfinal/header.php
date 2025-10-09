<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site carsallon-site">
    <header class="site-header car-header">
         Top Bar 
        <section class="top-bar">
            <div class="container">
                <div class="logo">
                    <?php 
                    if( has_custom_logo() ){
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo home_url( '/' ); ?>" class="site-title">
                            <span>CarsAllon</span>
                        </a>
                        <?php
                    }
                    ?>
                </div>

                <div class="contact-info">
                    <p><strong>Call Us:</strong> +1 800 123 4567</p>
                    <p><strong>Open:</strong> Mon–Sat 9AM–6PM</p>
                </div>

                <div class="searchbox">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>

         Navigation Menu 
        <?php if( ! is_page( 'landing-page' )): ?>
        <section class="menu-area">
            <div class="container">
                <nav class="main-menu car-menu">
                    <button class="check-button" aria-label="Toggle Menu">
                        <div class="menu-icon">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'wp_devs_main_menu',
                        'depth' => 2,
                        'menu_class' => 'nav-list',
                        'container' => false,
                    ));
                    ?>
                </nav>
            </div>
        </section>
        <?php endif; ?>
    </header>
