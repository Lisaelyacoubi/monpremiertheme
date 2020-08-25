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


function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'footer-1',
            'name'          => __( 'Footer 1' ),
            'description'   => __( 'Widget for footer 1' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'id'            => 'footer-2',
            'name'          => __( 'Footer 2' ),
            'description'   => __( 'Widget for footer 2' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
    register_sidebar(
        array(
            'id'            => 'footer-3',
            'name'          => __( 'Footer 3' ),
            'description'   => __( 'Widget for footer 3' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

add_action( 'widgets_init', 'my_register_sidebars' );
add_theme_support( 'custom-header', $header_info );
add_theme_support( 'custom-logo' );

add_action('after_setup_theme', 'montheme_supports');
add_action( 'wp_enqueue_scripts', 'montheme_enqueue_style' );
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_parts', 'montheme_document_title_parts');
add_theme_support('post-thumbnails');
add_action( 'init', 'register_my_menu' );


?>
