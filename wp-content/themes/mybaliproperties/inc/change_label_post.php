<?php

	function revcon_change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Properties';
	    $submenu['edit.php'][5][0] = 'View All';
	    $submenu['edit.php'][10][0] = 'Add New';
	    $submenu['edit.php'][16][0] = 'Tags';
	    echo '';
	}
	function revcon_change_post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'Properties';
	    $labels->singular_name = 'Properties';
	    $labels->add_new = 'Add Property';
	    $labels->add_new_item = 'Add Property';
	    $labels->edit_item = 'Edit Property';
	    $labels->new_item = 'Property';
	    $labels->view_item = 'View Property';
	    $labels->search_items = 'Search Property';
	    $labels->not_found = 'No Property found';
	    $labels->not_found_in_trash = 'No Property found in Trash';
	    $labels->all_items = 'All Property';
	    $labels->menu_name = 'Property';
	    $labels->name_admin_bar = 'Property';
	}
	 
	add_action( 'admin_menu', 'revcon_change_post_label' );
	add_action( 'init', 'revcon_change_post_object' );