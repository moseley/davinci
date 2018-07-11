<?php get_header(); ?>



    <?php if ( have_posts() ) : ?>

      </div><!-- #primary -->
        <div class="title">
          <div class="row no-gutters">
            <div class="col text-center">
              <h1><?php printf( esc_html__( 'Search Results for: %s', 'davinci' ), '<strong>' . get_search_query() . '</strong>'); ?></h1>
            </div>
          </div>
        </div>
      <div class="container-fluid search-results-spacing">

      <?php while ( have_posts() ) : the_post(); ?>
        <div class="row">
          <?php if ( get_the_post_thumbnail() ) : ?>
            <div class="col-md-3">
              <?php the_post_thumbnail( 'medium_large', ['class' => 'img-fluid'] ); ?>
            </div>
          <?php endif; ?>
          <div class="col">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <p><span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span></p>
          </div>
        </div>
      <?php endwhile; ?>
  <?php  endif; ?>

<?php get_footer(); ?>
