<?php
/**
 * Plugin Name: Movies Plugin
 * Description: Registers a 'Movies' custom post type with taxonomies and custom meta fields.
 * Version: 1.0
 * Author: ANIRBAN DAS
 * Requires at least: 5.2
 * Requires PHP: 7.2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Register Custom Post Type
function movies_register_post_type() {
    $args = array(
        'label' => 'Movies',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-video-alt2',
        'show_in_rest' => true,
    );
    register_post_type('movies', $args);
}
add_action('init', 'movies_register_post_type');

// Register Taxonomies
function movies_register_taxonomies() {
    // Genre (Hierarchical)
    register_taxonomy('genre', 'movies', array(
        'label' => 'Genre',
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Year (Non-Hierarchical)
    register_taxonomy('year', 'movies', array(
        'label' => 'Year',
        'hierarchical' => false,
        'show_in_rest' => true,
    ));
}
add_action('init', 'movies_register_taxonomies');

// Add Meta Box for Custom Fields
function movies_add_meta_box() {
    add_meta_box(
        'movies_meta_box',
        'Movie Details',
        'movies_meta_box_callback',
        'movies',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'movies_add_meta_box');

// Meta Box Callback
function movies_meta_box_callback($post) {
    $director = get_post_meta($post->ID, '_movie_director', true);
    $release_year = get_post_meta($post->ID, '_movie_release_year', true);
    $rating = get_post_meta($post->ID, '_movie_rating', true);
    ?>
    <p>
        <label for="movie_director">Director:</label>
        <input type="text" name="movie_director" value="<?php echo esc_attr($director); ?>" />
    </p>
    <p>
        <label for="movie_release_year">Release Year:</label>
        <input type="number" name="movie_release_year" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo esc_attr($release_year); ?>" />
    </p>
    <p>
        <label for="movie_rating">Rating:</label>
        <select name="movie_rating">
            <option value="1" <?php selected($rating, '1'); ?>>1 Star</option>
            <option value="2" <?php selected($rating, '2'); ?>>2 Stars</option>
            <option value="3" <?php selected($rating, '3'); ?>>3 Stars</option>
            <option value="4" <?php selected($rating, '4'); ?>>4 Stars</option>
            <option value="5" <?php selected($rating, '5'); ?>>5 Stars</option>
        </select>
    </p>
    <?php
}

// Save Meta Box Data
function movies_save_meta_box($post_id) {
    if (isset($_POST['movie_director'])) {
        update_post_meta($post_id, '_movie_director', sanitize_text_field($_POST['movie_director']));
    }
    if (isset($_POST['movie_release_year'])) {
        update_post_meta($post_id, '_movie_release_year', intval($_POST['movie_release_year']));
    }
    if (isset($_POST['movie_rating'])) {
        update_post_meta($post_id, '_movie_rating', sanitize_text_field($_POST['movie_rating']));
    }
}
add_action('save_post', 'movies_save_meta_box');




?>