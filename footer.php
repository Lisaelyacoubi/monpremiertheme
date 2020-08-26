
<footer class="bg-footer pt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <?php dynamic_sidebar('footer-1') ?>
      </div>
      <div class="col-lg-4">
        <?php dynamic_sidebar('footer-2') ?>
      </div>
      <div class="col-lg-4">
        <?php dynamic_sidebar('footer-3') ?>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-4 pt-5">
        <?php dynamic_sidebar('footer-4') ?>
      </div>
      <div class="col-lg-4 pt-5">
        <p>Tous Droits Réservés, &copy; <?php echo date('Y') ?> - <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name')  ?></a></p>
      </div>
      <div class="col-lg-4 pt-5">
        <p><?php dynamic_sidebar('footer-5') ?></p>
      </div>
    </div>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
  </div>
</body>
</html>
