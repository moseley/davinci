<?php if ( ! is_front_page() ) : ?>
</div><!-- #primary -->
  <div class="title">
    <div class="row no-gutters">
      <div class="col text-center">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
<div class="container-fluid">

<?php endif; ?>

<?php if ( have_rows('blocks') ) : ?>

  <?php while ( have_rows('blocks') ) : the_row(); ?>

    <?php if ( get_row_layout() == 'photos' ) : ?>

      <?php get_template_part( 'template-parts/blocks/content', 'photos' ); ?>

    <?php elseif ( get_row_layout() == 'headline' ) : ?>

      <?php get_template_part( 'template-parts/blocks/content', 'headline' ); ?>

    <?php elseif ( get_row_layout() == 'content' ) : ?>

      <?php get_template_part( 'template-parts/blocks/content', 'content' ); ?>

    <?php elseif ( get_row_layout() == 'bookmark' ) : ?>

      <?php get_template_part( 'template-parts/blocks/content', 'bookmark' ); ?>

    <?php elseif ( get_row_layout() == 'video' ) : ?>

      <?php get_template_part( 'template-parts/blocks/content', 'video' ); ?>

    <?php endif; ?>

  <?php endwhile; ?>

<?php else : ?>

  <?php the_content(); ?>

<?php endif; ?>
