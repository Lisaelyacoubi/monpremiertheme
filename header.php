<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php wp_head() ?>
  </head>
  <body <?php body_class(); ?> >
    <?php wp_body_open(); ?>
    <header class="header">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="">
            <a href="<?php echo home_url( '/' ); ?>">
             <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo navbar-brand">
           </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <?php echo wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) ?>
          </div>
        </nav>
    </header>


    <section class="container text-center pt-5">
      <h1 class="text-uppercase"><?php bloginfo('name'); ?></h1>
      <h2><?php bloginfo('description'); ?></h2>

    </section>
