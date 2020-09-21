<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentytwenty-style' for the Twenty twenty theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

function twentytwenty_child_theme_setup(){
	//disabling for now
	remove_action( 'widgets_init', 'twentytwenty_widgets_init');

	// Add a secondary menu to the child theme.
	//register_nav_menus(
	//	array(
	//		'menu-2' => __( 'Secondary', 'twentynineteen' ),
	//	)
	//);
}
add_action('after_setup_theme', 'twentytwenty_child_theme_setup');

/**
	 * Hides HTML with meta information about theme author.
	 */
	function twentytwenty_posted_by() {
		//do nothing
	}