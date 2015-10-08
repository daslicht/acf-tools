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
      wp_register_script('flexslider', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array( 'jquery' ), false, false);
      wp_register_script( 'load_flex', get_stylesheet_directory_uri() . '/js/load-flex.js', array ( 'jquery', 'flexslider' ), false, false);
      
      $speed = get_field( 'slideshow_speed' );
      $animation = get_field( 'animation_speed' );
      $animation_type = get_field( 'animation_type' );
      
      // get the settings for this post 
      
      wp_localize_script( 'flexslider', 'this_post_id', get_the_ID() );
      wp_localize_script( 'flexslider', 'animation', $animation_type );
      wp_localize_script( 'flexslider', 'animationSpeed', $animation );
      wp_localize_script( 'flexslider', 'slideshowSpeed', $speed );
      
      wp_enqueue_script( 'flexslider' );
      wp_enqueue_script( 'load_flex' );
      }
}
add_action( 'wp_enqueue_scripts', 'wagw_flexslider_gallery_scripts');

