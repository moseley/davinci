<div class="row align-items-end">
  <div class="col-sm">
    <?php if ( is_active_sidebar( 'footer-one' ) ) : ?>

      <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer One', 'davinci' ); ?>">
          <div class="widget-column footer-one">
            <?php dynamic_sidebar( 'footer-one' ); ?>
          </div>
      </aside>

    <?php endif; ?>
  </div><!-- .col -->
  <div class="col-sm">
    <?php if ( is_active_sidebar( 'footer-two' ) ) : ?>

      <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Two', 'davinci' ); ?>">
          <div class="widget-column footer-two">
            <?php dynamic_sidebar( 'footer-two' ); ?>
          </div>
      </aside>

    <?php endif; ?>
  </div><!-- .col -->
  <div class="col-sm">
    <?php if ( is_active_sidebar( 'footer-three' ) ) : ?>

      <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Three', 'davinci' ); ?>">
          <div class="widget-column footer-three">
            <?php dynamic_sidebar( 'footer-three' ); ?>
          </div>
      </aside>

    <?php endif; ?>
  </div><!-- .col -->
</div><!-- .row -->
