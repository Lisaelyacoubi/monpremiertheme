
<footer class="bg-footer pt-5">
  <div class="container-fluid">
    <div class="row">

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?>
        <?php endif;?>

    </div>
    <div class="row">
      <div class="col-lg-4 pt-5">
        <img src="images/footer/zombie-cartoon.jpg" alt="zombie cartoon" class="img-size-footer">
      </div>
      <div class="col-lg-4 pt-5">
        <a href="#">Zombieville</a>
        <p>Tous Droits Réservés, &amp; Copyright</p>
      </div>
      <div class="col-lg-4 pt-5">
        <p>Mentions légales</p>
      </div>
    </div>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
  </div>
</body>
</html>
