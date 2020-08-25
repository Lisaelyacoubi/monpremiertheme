<?php
//add_theme_support('title-tag');

function montheme_supports() {
  add_theme_support('title-tag');
}

function montheme_register_assets(){
  wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css');
  wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', ['popper'], false, true);
  wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
  wp_enqueue_style('bootstrap');
  wp_enqueue_script('bootstrap');
  //wp_enqueue_style('style', get_stylesheet_directory_uri());
}

function montheme_enqueue_style() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

function montheme_document_title_parts($title) {
  unset($title['tagline']);
  return $title;
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}


$header_info = array(
    'width'         => 854,
    'height'        => 464,
    'default-image' => get_template_directory_uri() . '/img/cover-zombie.jpeg',
);


add_theme_support( 'custom-header', $header_info  );

add_action('after_setup_theme', 'montheme_supports');
add_action( 'wp_enqueue_scripts', 'montheme_enqueue_style' );
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_parts', 'montheme_document_title_parts');
add_theme_support('post-thumbnails');
add_action( 'init', 'register_my_menu' );


?>
