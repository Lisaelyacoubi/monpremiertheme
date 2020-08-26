<?php get_header() ?>


<!-- BANNER -->
<section class="container">
  <img src="<?php echo header_image() ?>" alt="" class="img-fluid">
  <?php get_header_image() ?>
  <h2 class="text-uppercase font-title-header color-red-theme text-center pt-5">Bienvenue à Zombieville !</h2>
</section>


<!-- VISIT ZOMBIECITY-->
<section class="container bg-zombiecity pb-5 mt-2">
  <h2 class="color-red-theme pt-3">Articles récents</h2>
  <?php query_posts('order=desc&showposts=2'); ?>
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
            <p class="font-size-line-visite-zombiecity pt-5 pb-2"><?php echo substr(strip_tags($post->post_content), 0, 50); ?>... <br /><a href="<?php the_permalink(); ?>">Lire la suite</a></p>
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




<?php get_footer() ?>
