<?php
//add theme support
add_theme_support('post-thumbnails',array('post', 'sliders'));

//change label post
include 'inc/change_label_post.php';

//contact form
include TEMPLATEPATH . '/email/smtp.php';
include TEMPLATEPATH . '/email/xtemplate.contact.php';
include TEMPLATEPATH . '/email/xtemplate.sendtoadmin.php';

//display user request
include TEMPLATEPATH . '/user_request/user_request.php';

// Remove Open Sans that WP adds from frontend
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');

    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

