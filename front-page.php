<?php get_header() ?>


<!-- BANNER -->
<section class="container mt-5 pb-5">
  <div class="container">
    <img src="<?php echo header_image() ?>" alt="" class="img-fluid">
    <?php get_header_image() ?>
  </div>
</section>


<section class="container mt-5 pb-5 bg-zombiecity">
  <h2 class="color-red-theme pt-3">Evènements à venir</h2>
  <?php
  query_posts(array(
  'post_type' => 'evenements',
  'showposts' => 5
  ) );
  ?>
  <?php while (have_posts()) : the_post(); ?>
    <div class="container border-radius-div-theme bg-white pb-3">
      <div class="container pt-3">
        <div class="row">
          <div class="col border-radius-div-theme bg-zombiecity pt-2 pb-2">
            <p class="text-uppercase text-center"><?php the_terms( $post->ID, 'annees', 'Date de l\' évènement : ' );?></p><hr>
            <p class="text-uppercase text-center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
              <div class="d-flex justify-content-center mt-2 mb-2">
                <?php the_post_thumbnail('medium'); ?>
              </div>
              <p class="text-center"><?php echo substr(strip_tags($post->post_content), 0, 50); ?>... </p>
              <p class="text-center">   <?php the_terms( $post->ID, 'organisateurs', 'Evènement proposé par : ' ); ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile;?>
</section>


<!-- VISIT ZOMBIECITY-->
<section class="container bg-zombiecity pb-5 mt-2">
  <h2 class="color-red-theme pt-3">Visiter Zombieville</h2>
    <?php
    query_posts(array(
    'post_type' => 'visits',
    'showposts' => 5
    ) );
    ?>
  <?php while (have_posts()) : the_post(); ?>
    <div class="container bg-zombiecity pt-3 mb-2">
      <p class="text-white text-uppercase"><span class="bg-danger rounded pt-2 pb-2 pl-3 pr-3"><?php the_title(); ?></span></p>
      <div class="container border-radius-div-theme ml-5 pb-3">
        <div class="row bg-white">
          <div class="col-lg-6">
            <ul>
             <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium"); ?></a></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <p class="font-size-line-visite-zombiecity pt-5 pb-2"> <?php the_content('Lire la suite') ?> <br /></p>
              <div class="">
                <span>Le <?php the_time('j F Y'); ?></span><br>
                <span>Auteur : <?php the_author(); ?></span>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; ?>

  <!-- ARTICLES-->
  <section class="container bg-zombiecity pb-5 mt-2">

  <h2 class="color-red-theme pt-3 pb-5">Articles récents</h2>
  <?php
  $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
  if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
  ?>
    <div class="container bg-zombiecity pb-5 mt-2">
      <h3 class="text-center text-white"><span class="title-articles pl-5 pr-5 pt-4 pb-4"><?php the_title() ?></span></h3><br>
      <div class="container bg-white border-radius-div-theme pt-5 pb-5">
        <a href="#" class="mt-3 mb-3 d-flex justify-content-center"><?php the_category(); ?></a>
        <article class="">
          <div class="row">
            <div class="col-lg-4 d-flex justify-content-center">
              <?php the_post_thumbnail('medium'); ?>
            </div>
            <div class="col-lg-8 bg-light pt-4">
              <p class="pl-3 font-size-line-visite-zombiecity">
                <?php the_content('Lire la suite') ?>
              </p>
            </div>
            <div class="text-center">
              <span>  <?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?></span>
              <p class="pt-5">Ecrit par <a href=" "><?php the_author(); ?></a>, le <?php the_time( get_option( 'date_format' ) ); ?></p>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>

  <?php
  endwhile;
  else :
  ?>
  <p>Il n'y a aucun articles</p>
  <?php
  endif;
  ?>



<?php get_footer() ?>
