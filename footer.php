</div><!-- .container-fluid -->
<?php get_template_part( 'template-parts/form/contact', 'panel' ); ?>
<footer class="footer">
  <div class="container">
    <div class="row align-items-end">
      <div class="col">
        <?php if ( is_active_sidebar( 'footer-one' ) ) : ?>

        	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer One', 'davinci' ); ?>">
        			<div class="widget-column footer-one">
        				<?php dynamic_sidebar( 'footer-one' ); ?>
        			</div>
          </aside>

        <?php endif; ?>
      </div><!-- .col -->
      <div class="col">
        <?php if ( is_active_sidebar( 'footer-two' ) ) : ?>

        	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Two', 'davinci' ); ?>">
        			<div class="widget-column footer-two">
        				<?php dynamic_sidebar( 'footer-two' ); ?>
        			</div>
          </aside>

        <?php endif; ?>
      </div><!-- .col -->
      <div class="col">
        <?php if ( is_active_sidebar( 'footer-three' ) ) : ?>

        	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Three', 'davinci' ); ?>">
        			<div class="widget-column footer-three">
        				<?php dynamic_sidebar( 'footer-three' ); ?>
        			</div>
          </aside>

        <?php endif; ?>
      </div><!-- .col -->
    </div><!-- .row -->
  </div><!-- .container -->
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>
