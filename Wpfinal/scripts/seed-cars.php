<?php
/**
 * Script to seed example cars into the database
 * Run this script once to populate the Cars custom post type with example data
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if we're in WordPress environment
if (!function_exists('wp_insert_post')) {
    die('WordPress not loaded properly');
}

// Car data with images
$cars = [
    [
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
    ],
    [
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
    ],
    [
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
    ]
];

echo "Starting to seed cars...\n\n";

foreach ($cars as $car) {
    // Create the post
    $post_data = [
        'post_title'   => $car['title'],
        'post_content' => $car['description'],
        'post_status'  => 'publish',
        'post_type'    => 'car',
        'post_author'  => 1
    ];
    
    $post_id = wp_insert_post($post_data);
    
    if (is_wp_error($post_id)) {
        echo "Error creating post: " . $car['title'] . "\n";
        continue;
    }
    
    echo "Created car: " . $car['title'] . " (ID: $post_id)\n";
    
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
    
    // Download image from URL
    $image_url = $car['image_url'];
    $tmp = download_url($image_url);
    
    if (!is_wp_error($tmp)) {
        $file_array = [
            'name' => basename($car['title']) . '.jpg',
            'tmp_name' => $tmp
        ];
        
        $attachment_id = media_handle_sideload($file_array, $post_id);
        
        if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($post_id, $attachment_id);
            echo "  - Added featured image\n";
        } else {
            @unlink($file_array['tmp_name']);
            echo "  - Error adding image: " . $attachment_id->get_error_message() . "\n";
        }
    } else {
        echo "  - Error downloading image: " . $tmp->get_error_message() . "\n";
    }
    
    echo "  - Added meta data and taxonomies\n\n";
}

echo "Seeding complete!\n";
echo "Visit your site to see the cars at: /cars/\n";
?>
