<?php
/**
 * Hrc Sallon Theme Functions
 *
 * @package Hrc_Sallon
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function hrc_sallon_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);

    // Add custom image sizes
    add_image_size('hrc-sallon-featured', 800, 450, true);
    add_image_size('hrc-sallon-thumbnail', 400, 300, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'wp-devs'),
        'footer'  => esc_html__('Footer Menu', 'wp-devs'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Load translation files
    load_theme_textdomain('wp-devs', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'hrc_sallon_setup');

/**
 * Set the content width in pixels
 */
function hrc_sallon_content_width() {
    $GLOBALS['content_width'] = apply_filters('hrc_sallon_content_width', 1200);
}
add_action('after_setup_theme', 'hrc_sallon_content_width', 0);

/**
 * Register widget areas
 */
function hrc_sallon_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'wp-devs'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'wp-devs'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'wp-devs'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add footer widgets here.', 'wp-devs'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'hrc_sallon_widgets_init');

/**
 * Enqueue scripts and styles
 */
function hrc_sallon_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('hrc-sallon-style', get_stylesheet_uri(), array(), '1.0');

    // Enqueue custom JavaScript
    wp_enqueue_script('hrc-sallon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true);

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'hrc_sallon_scripts');

/**
 * Custom excerpt length
 */
function hrc_sallon_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'hrc_sallon_excerpt_length');

/**
 * Custom excerpt more
 */
function hrc_sallon_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'hrc_sallon_excerpt_more');

/**
 * Add a pingback url auto-discovery header for single posts
 */
function hrc_sallon_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'hrc_sallon_pingback_header');

/**
 * Custom template tags for this theme
 */

/**
 * Prints HTML with meta information for the current post-date/time
 */
function hrc_sallon_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf($time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'wp-devs'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';
}

/**
 * Prints HTML with meta information for the current author
 */
function hrc_sallon_posted_by() {
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'wp-devs'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

/**
 * Display navigation to next/previous set of posts
 */
function hrc_sallon_pagination() {
    the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => esc_html__('Previous', 'wp-devs'),
        'next_text' => esc_html__('Next', 'wp-devs'),
        'class'     => 'pagination',
    ));
}

// Register Cars Custom Post Type
function hrc_sallon_register_cars_post_type() {
    $labels = array(
        'name'                  => _x('Cars', 'Post Type General Name', 'wp-devs'),
        'singular_name'         => _x('Car', 'Post Type Singular Name', 'wp-devs'),
        'menu_name'             => __('Cars', 'wp-devs'),
        'name_admin_bar'        => __('Car', 'wp-devs'),
        'archives'              => __('Car Archives', 'wp-devs'),
        'attributes'            => __('Car Attributes', 'wp-devs'),
        'parent_item_colon'     => __('Parent Car:', 'wp-devs'),
        'all_items'             => __('All Cars', 'wp-devs'),
        'add_new_item'          => __('Add New Car', 'wp-devs'),
        'add_new'               => __('Add New', 'wp-devs'),
        'new_item'              => __('New Car', 'wp-devs'),
        'edit_item'             => __('Edit Car', 'wp-devs'),
        'update_item'           => __('Update Car', 'wp-devs'),
        'view_item'             => __('View Car', 'wp-devs'),
        'view_items'            => __('View Cars', 'wp-devs'),
        'search_items'          => __('Search Car', 'wp-devs'),
        'not_found'             => __('Not found', 'wp-devs'),
        'not_found_in_trash'    => __('Not found in Trash', 'wp-devs'),
        'featured_image'        => __('Car Image', 'wp-devs'),
        'set_featured_image'    => __('Set car image', 'wp-devs'),
        'remove_featured_image' => __('Remove car image', 'wp-devs'),
        'use_featured_image'    => __('Use as car image', 'wp-devs'),
        'insert_into_item'      => __('Insert into car', 'wp-devs'),
        'uploaded_to_this_item' => __('Uploaded to this car', 'wp-devs'),
        'items_list'            => __('Cars list', 'wp-devs'),
        'items_list_navigation' => __('Cars list navigation', 'wp-devs'),
        'filter_items_list'     => __('Filter cars list', 'wp-devs'),
    );

    $args = array(
        'label'                 => __('Car', 'wp-devs'),
        'description'           => __('Car listings', 'wp-devs'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-car',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'cars'),
    );

    register_post_type('car', $args);
}
add_action('init', 'hrc_sallon_register_cars_post_type', 0);

// Register Car Brand Taxonomy
function hrc_sallon_register_car_taxonomies() {
    // Car Brand Taxonomy
    $brand_labels = array(
        'name'              => _x('Brands', 'taxonomy general name', 'wp-devs'),
        'singular_name'     => _x('Brand', 'taxonomy singular name', 'wp-devs'),
        'search_items'      => __('Search Brands', 'wp-devs'),
        'all_items'         => __('All Brands', 'wp-devs'),
        'parent_item'       => __('Parent Brand', 'wp-devs'),
        'parent_item_colon' => __('Parent Brand:', 'wp-devs'),
        'edit_item'         => __('Edit Brand', 'wp-devs'),
        'update_item'       => __('Update Brand', 'wp-devs'),
        'add_new_item'      => __('Add New Brand', 'wp-devs'),
        'new_item_name'     => __('New Brand Name', 'wp-devs'),
        'menu_name'         => __('Brands', 'wp-devs'),
    );

    $brand_args = array(
        'hierarchical'      => true,
        'labels'            => $brand_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'car-brand'),
        'show_in_rest'      => true,
    );

    register_taxonomy('car_brand', array('car'), $brand_args);

    // Car Type Taxonomy
    $type_labels = array(
        'name'              => _x('Types', 'taxonomy general name', 'wp-devs'),
        'singular_name'     => _x('Type', 'taxonomy singular name', 'wp-devs'),
        'search_items'      => __('Search Types', 'wp-devs'),
        'all_items'         => __('All Types', 'wp-devs'),
        'parent_item'       => __('Parent Type', 'wp-devs'),
        'parent_item_colon' => __('Parent Type:', 'wp-devs'),
        'edit_item'         => __('Edit Type', 'wp-devs'),
        'update_item'       => __('Update Type', 'wp-devs'),
        'add_new_item'      => __('Add New Type', 'wp-devs'),
        'new_item_name'     => __('New Type Name', 'wp-devs'),
        'menu_name'         => __('Types', 'wp-devs'),
    );

    $type_args = array(
        'hierarchical'      => true,
        'labels'            => $type_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'car-type'),
        'show_in_rest'      => true,
    );

    register_taxonomy('car_type', array('car'), $type_args);
}
add_action('init', 'hrc_sallon_register_car_taxonomies', 0);

// Add Car Details Meta Box
function hrc_sallon_add_car_meta_boxes() {
    add_meta_box(
        'car_details',
        __('Car Details', 'wp-devs'),
        'hrc_sallon_car_details_callback',
        'car',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'hrc_sallon_add_car_meta_boxes');

/**
 * Car Details Meta Box Callback
 */
function hrc_sallon_car_details_callback($post) {
    wp_nonce_field('hrc_sallon_save_car_details', 'hrc_sallon_car_details_nonce');

    $year = get_post_meta($post->ID, '_car_year', true);
    $model = get_post_meta($post->ID, '_car_model', true);
    $price = get_post_meta($post->ID, '_car_price', true);
    $mileage = get_post_meta($post->ID, '_car_mileage', true);
    $fuel_type = get_post_meta($post->ID, '_car_fuel_type', true);
    $transmission = get_post_meta($post->ID, '_car_transmission', true);
    $color = get_post_meta($post->ID, '_car_color', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="car_year"><?php _e('Year', 'wp-devs'); ?></label></th>
            <td><input type="number" id="car_year" name="car_year" value="<?php echo esc_attr($year); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="car_model"><?php _e('Model', 'wp-devs'); ?></label></th>
            <td><input type="text" id="car_model" name="car_model" value="<?php echo esc_attr($model); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="car_price"><?php _e('Price', 'wp-devs'); ?></label></th>
            <td><input type="text" id="car_price" name="car_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="$25,000" /></td>
        </tr>
        <tr>
            <th><label for="car_mileage"><?php _e('Mileage', 'wp-devs'); ?></label></th>
            <td><input type="text" id="car_mileage" name="car_mileage" value="<?php echo esc_attr($mileage); ?>" class="regular-text" placeholder="50,000 km" /></td>
        </tr>
        <tr>
            <th><label for="car_fuel_type"><?php _e('Fuel Type', 'wp-devs'); ?></label></th>
            <td>
                <select id="car_fuel_type" name="car_fuel_type" class="regular-text">
                    <option value=""><?php _e('Select Fuel Type', 'wp-devs'); ?></option>
                    <option value="Petrol" <?php selected($fuel_type, 'Petrol'); ?>><?php _e('Petrol', 'wp-devs'); ?></option>
                    <option value="Diesel" <?php selected($fuel_type, 'Diesel'); ?>><?php _e('Diesel', 'wp-devs'); ?></option>
                    <option value="Electric" <?php selected($fuel_type, 'Electric'); ?>><?php _e('Electric', 'wp-devs'); ?></option>
                    <option value="Hybrid" <?php selected($fuel_type, 'Hybrid'); ?>><?php _e('Hybrid', 'wp-devs'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="car_transmission"><?php _e('Transmission', 'wp-devs'); ?></label></th>
            <td>
                <select id="car_transmission" name="car_transmission" class="regular-text">
                    <option value=""><?php _e('Select Transmission', 'wp-devs'); ?></option>
                    <option value="Manual" <?php selected($transmission, 'Manual'); ?>><?php _e('Manual', 'wp-devs'); ?></option>
                    <option value="Automatic" <?php selected($transmission, 'Automatic'); ?>><?php _e('Automatic', 'wp-devs'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="car_color"><?php _e('Color', 'wp-devs'); ?></label></th>
            <td><input type="text" id="car_color" name="car_color" value="<?php echo esc_attr($color); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Car Details Meta Box Data
 */
function hrc_sallon_save_car_details($post_id) {
    if (!isset($_POST['hrc_sallon_car_details_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['hrc_sallon_car_details_nonce'], 'hrc_sallon_save_car_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('car_year', 'car_model', 'car_price', 'car_mileage', 'car_fuel_type', 'car_transmission', 'car_color');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'hrc_sallon_save_car_details');

/**
 * Add admin menu item for seeding cars
 */
function hrc_sallon_add_seed_cars_page() {
    add_submenu_page(
        'edit.php?post_type=car',
        __('Seed Example Cars', 'wp-devs'),
        __('Seed Examples', 'wp-devs'),
        'manage_options',
        'seed-cars',
        'hrc_sallon_seed_cars_page_content'
    );
}
add_action('admin_menu', 'hrc_sallon_add_seed_cars_page');

/**
 * Seed cars page content
 */
function hrc_sallon_seed_cars_page_content() {
    // Check if form was submitted
    if (isset($_POST['seed_cars']) && check_admin_referer('seed_cars_action', 'seed_cars_nonce')) {
        hrc_sallon_seed_example_cars();
        echo '<div class="notice notice-success"><p>' . __('Example cars have been added successfully!', 'wp-devs') . '</p></div>';
    }
    
    ?>
    <div class="wrap">
        <h1><?php _e('Seed Example Cars', 'wp-devs'); ?></h1>
        <p><?php _e('Click the button below to add example cars (Audi A5, Mercedes-Benz C-Class, BMW 2 Series) to your site.', 'wp-devs'); ?></p>
        <form method="post">
            <?php wp_nonce_field('seed_cars_action', 'seed_cars_nonce'); ?>
            <input type="submit" name="seed_cars" class="button button-primary" value="<?php esc_attr_e('Add Example Cars', 'wp-devs'); ?>">
        </form>
        <hr>
        <h2><?php _e('What will be added:', 'wp-devs'); ?></h2>
        <ul style="list-style: disc; margin-left: 20px;">
            <li><?php _e('Audi A5 Sportback (2023, Gray, $52,000)', 'wp-devs'); ?></li>
            <li><?php _e('Mercedes-Benz C-Class (2023, Black, $48,000)', 'wp-devs'); ?></li>
            <li><?php _e('BMW 2 Series Gran Coupe (2023, White, $45,000)', 'wp-devs'); ?></li>
        </ul>
        <p><em><?php _e('Note: Cars that already exist will not be duplicated.', 'wp-devs'); ?></em></p>
    </div>
    <?php
}

/**
 * Seed example cars function
 */
function hrc_sallon_seed_example_cars() {
    $cars = array(
        array(
            'title' => 'Audi A5 Sportback',
            'description' => 'Experience luxury and performance with this stunning Audi A5 Sportback. Features a powerful engine, premium interior, and cutting-edge technology. Perfect for those who demand both style and substance.',
            'image_url' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/audi-1zOY1OmVq2qPu6NBUu7tTsDKeIWm6n.jpg',
            'year' => '2023',
            'model' => 'A5 Sportback',
            'price' => '52000',
            'mileage' => '5000',
            'fuel_type' => 'Petrol',
            'transmission' => 'Automatic',
            'color' => 'Gray',
            'brand' => 'Audi',
            'type' => 'Sedan'
        ),
        array(
            'title' => 'Mercedes-Benz C-Class',
            'description' => 'Elegance meets innovation in this Mercedes-Benz C-Class. Equipped with advanced safety features, luxurious comfort, and exceptional performance. A true symbol of automotive excellence.',
            'image_url' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/mercedes-giQC6O93PTMIvwLSm17QcHXj6fLxwe.jpg',
            'year' => '2023',
            'model' => 'C-Class',
            'price' => '48000',
            'mileage' => '3500',
            'fuel_type' => 'Diesel',
            'transmission' => 'Automatic',
            'color' => 'Black',
            'brand' => 'Mercedes-Benz',
            'type' => 'Sedan'
        ),
        array(
            'title' => 'BMW 2 Series Gran Coupe',
            'description' => 'Dynamic driving pleasure in a sleek package. This BMW 2 Series Gran Coupe combines sporty handling with premium comfort. Features the latest BMW technology and a refined interior.',
            'image_url' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/bmw-fH0ms5lU3ehqDbvPgBC9wMF5auCvvY.jpg',
            'year' => '2023',
            'model' => '2 Series Gran Coupe',
            'price' => '45000',
            'mileage' => '4200',
            'fuel_type' => 'Petrol',
            'transmission' => 'Automatic',
            'color' => 'White',
            'brand' => 'BMW',
            'type' => 'Coupe'
        )
    );
    
    foreach ($cars as $car) {
        // Check if car already exists
        $existing = get_page_by_title($car['title'], OBJECT, 'car');
        if ($existing) {
            continue; // Skip if already exists
        }
        
        // Create the post
        $post_data = array(
            'post_title'   => $car['title'],
            'post_content' => $car['description'],
            'post_status'  => 'publish',
            'post_type'    => 'car',
            'post_author'  => get_current_user_id()
        );
        
        $post_id = wp_insert_post($post_data);
        
        if (is_wp_error($post_id)) {
            continue;
        }
        
        // Add meta data
        update_post_meta($post_id, '_car_year', $car['year']);
        update_post_meta($post_id, '_car_model', $car['model']);
        update_post_meta($post_id, '_car_price', $car['price']);
        update_post_meta($post_id, '_car_mileage', $car['mileage']);
        update_post_meta($post_id, '_car_fuel_type', $car['fuel_type']);
        update_post_meta($post_id, '_car_transmission', $car['transmission']);
        update_post_meta($post_id, '_car_color', $car['color']);
        
        // Set brand taxonomy
        $brand_term = term_exists($car['brand'], 'car_brand');
        if (!$brand_term) {
            $brand_term = wp_insert_term($car['brand'], 'car_brand');
        }
        if (!is_wp_error($brand_term)) {
            wp_set_object_terms($post_id, (int)$brand_term['term_id'], 'car_brand');
        }
        
        // Set type taxonomy
        $type_term = term_exists($car['type'], 'car_type');
        if (!$type_term) {
            $type_term = wp_insert_term($car['type'], 'car_type');
        }
        if (!is_wp_error($type_term)) {
            wp_set_object_terms($post_id, (int)$type_term['term_id'], 'car_type');
        }
        
        // Handle featured image
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        
        $tmp = download_url($car['image_url']);
        
        if (!is_wp_error($tmp)) {
            $file_array = array(
                'name' => sanitize_file_name($car['title']) . '.jpg',
                'tmp_name' => $tmp
            );
            
            $attachment_id = media_handle_sideload($file_array, $post_id);
            
            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            } else {
                @unlink($file_array['tmp_name']);
            }
        }
    }
}

/**
 * Handle contact form submission
 */
function hrc_sallon_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'hrc_sallon_contact_form')) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    // Prepare email
    $to = get_option('admin_email');
    $email_subject = sprintf(__('[%s] New Contact Form Submission: %s', 'wp-devs'), get_bloginfo('name'), $subject);
    
    $email_message = sprintf(
        __("You have received a new message from your website contact form.\n\nName: %s\nEmail: %s\nPhone: %s\nSubject: %s\n\nMessage:\n%s", 'wp-devs'),
        $name,
        $email,
        $phone,
        $subject,
        $message
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send email
    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    // Redirect with success or error message
    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_hrc_sallon_contact_form', 'hrc_sallon_handle_contact_form');
add_action('admin_post_nopriv_hrc_sallon_contact_form', 'hrc_sallon_handle_contact_form');
