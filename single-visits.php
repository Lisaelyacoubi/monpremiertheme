<?php get_header() ?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class=" mb-5 pb-5 bg-zombiecity container border rounded">
      <section class="container">
        <h2 class="text-uppercase text-center pt-5 pb-2"><?php the_title() ?></h2>
        <a href="#" class="mb-5 d-flex justify-content-center"><?php the_category() ?></a>
        <div class="d-flex justify-content-center">
          <?php the_post_thumbnail('medium_large'); ?>
        </div>
      </section>
      <section class="container pt-5">
        <p class="text-center"><?php the_content() ?></p>
      </section>
    </div>

    <section class="container bg-white">
      <div class="post">
        <?php comments_template(); // Par ici les commentaires ?>
      </div>
    </section>

<?php endwhile; endif ?>

<?php get_footer() ?>
