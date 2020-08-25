<?php get_header() ?>


<!-- BANNER -->
<section class="container bg-zombie">
  <img src="<?php echo header_image() ?>" alt="">

<?php get_header_image() ?>
  <h2 class="text-uppercase font-title-header color-red-theme text-center pt-5">Bienvenue à Zombieville !</h2>
</section>
<section class="container size-banner-description bg-zombiecity">
  <h3 class="color-red-theme text-center ml-5 mr-5 pt-5">Venez découvrir la première ville de zombies en France. De véritables zombies dans leur milieu naturel : des festivals, des évènements inoubliables.... </h3>
</section>


<!-- VISIT ZOMBIECITY-->
<section class="container bg-zombiecity pb-5 mt-2">
  <h2 class="color-red-theme pt-3">Visiter Zombieville</h2>
  <?php query_posts('order=desc&showposts=2'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="container bg-zombiecity pt-3 mb-2">
      <p class="text-white text-uppercase"><span class="bg-danger rounded pt-2 pb-2 pl-3 pr-3"><?php the_title(); ?></span></p>
      <div class="container border-radius-div-theme bg-white ml-5 pb-3">
        <div class="row">
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
