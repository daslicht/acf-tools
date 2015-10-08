<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'jetpack', get_stylesheet_directory_uri() . '/my-jetpack-carousel.css','jetpack' );
}

function load_fonts() {
  wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Raleway:400,600');
  wp_enqueue_style( 'googleFonts');
        }

add_action('wp_print_styles', 'load_fonts');


function footer_sidebar() {

	$args = array(
		'id'            => 'footer',
		'name'          => __( 'Footer', 'sds' ),
		'description'   => __( 'A widget area in the footer (duh!)', 'sds' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'footer_sidebar',50 );
