<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if ( have_rows('blocks') ) : ?>
        <?php while ( have_rows('blocks') ) : the_row(); ?>
          <?php if ( get_row_layout() == 'photo' ) : ?>
            <?php $photo = get_sub_field('photo'); ?>
            <?php if ( $photo ) : ?>
              <div class="row">
                <div class="col">
                  <div class="block-photo">
                    <img src="<?php echo $photo['url']; ?>" class="img-fluid">
                    <?php if ( get_sub_field('overlay') != 'na' ) : ?>
                      <div class="caption-<?php the_sub_field('overlay'); ?> caption-pos-<?php the_sub_field('position'); ?>">
                        <?php if ( $photo['title'] != '' ) : ?>
                          <h3><?php echo $photo['title']; ?></h3>
                        <?php endif; ?>
                        <?php if ( $photo['caption'] != '' ) : ?>
                          <p><?php echo $photo['caption']; ?></p>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php elseif ( get_row_layout() == 'headline' ) : ?>
            <div class="row">
              <div class="col">
                <div class="block-headline">
                  <h2><?php the_sub_field('headline'); ?></h2>
                  <p><?php the_sub_field('subline'); ?></p>
                </div>
              </div>
            </div>
          <?php elseif ( get_row_layout() == 'gallery' ) : ?>
            <?php $gallery = get_sub_field('gallery'); ?>
            <?php if ( $gallery ) : ?>
              <div class="row">
              <?php foreach ( $gallery as $image ) : ?>
                <div class="col">
                  <div class="block-photo">
                    <img src="<?php echo $image['url']; ?>" class="img-fluid">
                    <div class="caption">
                      <?php if ( $image['title'] != '' ) : ?>
                        <h3><?php echo $image['title']; ?></h3>
                      <?php endif; ?>
                      <?php if ( $image['caption'] != '' ) : ?>
                        <p><?php echo $image['caption']; ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else : ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      <?php endif; ?>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
