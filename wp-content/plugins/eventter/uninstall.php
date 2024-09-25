<?php

/**
 * Trigger this file on plugin unistall
 */


if(!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$events = get_posts(['post_type' => 'event', 'numberposts' => -1]);

foreach($events as $event) {
    wp_delete_post($book->ID, true);
}

global $wpdb;

$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'event'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (select id from wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (select id from wp_posts)");