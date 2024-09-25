<?php

/*
 * Plugin Name:       eventter
 * Description:       simple plugin with event post type.
 * Version:           1.0.0 
 * Author:            Raphael Alves
 * Author URI:        https://raphaelalves.tech
 */

if(!defined('ABSPATH')) {
    die('Absolute path not defined');
}

class Eventter {

    public function __construct() {
        add_action('init', array($this, 'custom_post_type'));
        add_action('add_meta_boxes', array($this, 'add_event_meta_box'));
        add_action('save_post', array($this, 'save_event_meta'));
        add_action('graphql_register_types', function() {
            register_graphql_field('event', 'date', [
                'type' => 'String',
                'description' => 'Date of the event',
                'resolve' => function($post) {
                    return get_post_meta($post->ID, '_event_date', true);
                },
            ]);
        
            register_graphql_field('event', 'description', [
                'type' => 'String',
                'description' => 'Description of the event',
                'resolve' => function($post) {
                    return get_post_meta($post->ID, '_event_description', true);
                },
            ]);
        });
    }

    public function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    public function deactivate() {
        flush_rewrite_rules();
    }

    public function custom_post_type() {
        register_post_type('event', [
            'public' => true,
            'label' => 'Events',
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_graphql' => true, 
            'graphql_single_name' => 'event',
            'graphql_plural_name' => 'events',
        ]);
    }

    public function add_event_meta_box() {
        add_meta_box(
            'event_meta_box',
            'Event Details',
            array($this, 'render_event_meta_box'), 
            'event'
        );
    }

    public function render_event_meta_box($post) {
        wp_nonce_field('event_meta_box_nonce', 'meta_box_nonce');

        $event_date = get_post_meta($post->ID, '_event_date', true);
        $event_description = get_post_meta($post->ID, '_event_description', true);

        echo '<label for="event_date">Event Date:</label>';
        echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" /><br><br>';
        
        echo '<label for="event_description">Event Description:</label>';
        echo '<textarea id="event_description" name="event_description">' . esc_textarea($event_description) . '</textarea>';
    }

    public function save_event_meta($post_id) {
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'event_meta_box_nonce')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['post_type']) && 'event' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        if (array_key_exists('event_date', $_POST)) {
            update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
        }

        if (array_key_exists('event_description', $_POST)) {
            update_post_meta($post_id, '_event_description', sanitize_textarea_field($_POST['event_description']));
        }
    }
}

if(class_exists('Eventter')) {
    $eventter = new Eventter();
}

register_activation_hook(__FILE__, [$eventter, 'activate']);
register_deactivation_hook(__FILE__, [$eventter, 'deactivate']);