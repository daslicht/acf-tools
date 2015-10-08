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


/*  
 * Advanced Custom Fields stuff
*/

// add theme options page

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array (
                     'page_title' => 'WAGW Theme Options',
                     'page_slug'  => 'wagw_options',
                     'autoload'   => true,
                      )
                     );
}

// if using the page-hero template, enqueue flexsider

function wagw_flexslider_gallery_scripts() {
   if ( is_page_template( 'page-hero.php' ) ) {
       wp_enqueue_script( 'jquery' );
       wp_register_script('flexslider', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array( 'jquery' ), false, true);
       wp_enqueue_script( 'flexslider' );
      }
}
add_action( 'wp_enqueue_scripts', 'wagw_flexslider_gallery_scripts');
