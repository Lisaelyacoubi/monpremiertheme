<?php get_header() ?>



<!-- ARTICLES-->
<section class="container bg-zombiecity pb-5 mt-2">

<h2 class="color-red-theme pt-3 pb-5">Articles récents</h2>
<?php
// checks if there are any posts that match the query
if (have_posts()) :

  // If there are posts matching the query then start the loop
  while ( have_posts() ) : the_post();

    // the code between the while loop will be repeated for each post
?>
  <div class="container bg-zombiecity  mt-2">
    <h3 class="text-center text-white"><span class="title-articles pl-5 pr-5 pt-4 pb-4"><?php the_title() ?></span></h3><br>
    <div class="container bg-white border-radius-div-theme pt-5 pb-5">
      <a href="#" class="mt-3 mb-3 d-flex justify-content-center"><?php the_category(); ?></a>
      <article class="">
        <div class="row ">
          <div class="col-lg-4 d-flex justify-content-center">
            <img src="<?php the_post_thumbnail('medium'); ?>" alt="">
          </div>
          <div class="col-lg-8 bg-light pt-4">
            <p class="pl-3 font-size-line-visite-zombiecity">
              <?php the_content('Lire la suite') ?>
            </p>
          </div>
          <div class="text-center">
            <span>  <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></span>
            <p class="pt-5">Ecrit par <a href=" "><?php the_author(); ?></a>, le <?php the_time( get_option( 'date_format' ) ); ?></p>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>

<?php

// Stop the loop when all posts are displayed
endwhile;

// If no posts were found
else :
?>
<p>Il n'y a aucun articles</p>
<?php
endif;
?>

<!-- PAGINATION-->
<section class="container bg-zombiecity pb-5 mt-2">
  <div class="container pb-5 pt-5">
    <hr>
    <div class="pagination">
      <a href="#">&laquo;</a>
      <a href="#">1</a>
      <a class="active" href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">6</a>
      <a href="#">&raquo;</a>
    </div>
</section>




<?php get_footer() ?>
