<?php get_header() ?>

<?php if ( ! is_active_sidebar( 'sidebar-3' ) ) {
    return;
} ?>


<aside id="footer-widget-area" class="footer-widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer widget area', 'carbon-lite' ); ?>">
    <div class="footer-widgets">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
</aside>

<?php get_footer() ?>
