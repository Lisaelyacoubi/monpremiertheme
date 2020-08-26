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
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_action( 'wp_enqueue_scripts', 'montheme_enqueue_style' );
add_filter('document_title_parts', 'montheme_document_title_parts');
add_theme_support('post-thumbnails');
add_action( 'init', 'register_my_menu' );


/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Événements', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Évènement', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Évènements'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les évènements'),
		'view_item'           => __( 'Voir les évènements'),
		'add_new_item'        => __( 'Ajouter un nouvel évènement'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer l\' évènement'),
		'update_item'         => __( 'Modifier l\' évènement'),
		'search_items'        => __( 'Rechercher un évènement'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);

	// On peut définir ici d'autres options pour notre custom post type

	$args = array(
		'label'               => __( 'Évènements'),
		'description'         => __( 'Tous sur les évènements'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'menu_icon'      => 'dashicons-calendar-alt',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/*
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'evenements'),

	);

	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'evenements', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );


add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {

	// Taxonomie Année

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_annee = array(
		'name'              			=> _x( 'Années', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Année', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher une année'),
		'all_items'        				=> __( 'Toutes les années'),
		'edit_item'         			=> __( 'Editer l année'),
		'update_item'       			=> __( 'Mettre à jour l année'),
		'add_new_item'     				=> __( 'Ajouter une nouvelle année'),
		'new_item_name'     			=> __( 'Valeur de la nouvelle année'),
		'separate_items_with_commas'	=> __( 'Séparer les réalisateurs avec une virgule'),
		'menu_name'         => __( 'Année'),
	);

	$args_annee = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_annee,
		'show_ui'           => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'annees' ),
	);

	register_taxonomy( 'annees', 'evenements', $args_annee );

	// Taxonomie Réalisateurs

	$labels_realisateurs = array(
		'name'                       => _x( 'Organisateurs', 'taxonomy general name'),
		'singular_name'              => _x( 'Organisateur', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une organisation'),
		'all_items'                  => __( 'Tous les organisations'),
		'edit_item'                  => __( 'Editer un organisateur'),
		'update_item'                => __( 'Mettre à jour un organisateur'),
		'add_new_item'               => __( 'Ajouter un nouvel organisateur'),
		'new_item_name'              => __( 'Nom du nouveau organisateur'),
		'separate_items_with_commas' => __( 'Séparer les organisateurs avec une virgule'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un organisateur'),
		'not_found'                  => __( 'Pas d\' organisateurs trouvés'),
		'menu_name'                  => __( 'Organisateurs'),
	);

	$args_realisateurs = array(
		'hierarchical'          => false,
		'labels'                => $labels_realisateurs,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'organisateurs' ),
	);

	register_taxonomy( 'organisateurs', 'evenements', $args_realisateurs );
}

?>
