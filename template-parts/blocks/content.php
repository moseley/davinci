<?php if ( ! is_front_page() ) : ?>

  <div class="title">
    <div class="row">
      <div class="col text-center">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>

<?php endif; ?>

<?php if ( have_rows('blocks') ) : ?>

  <?php while ( have_rows('blocks') ) : the_row(); ?>

    <?php if ( get_row_layout() == 'photos' ) : ?>

      <?php $photos = get_sub_field('photos'); ?>

      <?php if ( $photos ) : ?>
        <?php

        if (get_sub_field('gallery_type') == 'full') {
          $slickOptions = '{"dots": true, "arrows": false, "autoplay": true, "autoplaySpeed": 3000}';
        }
        elseif (get_sub_field('gallery_type') == 'two') {
          $slickOptions = '{"slidesToShow": 2, "slidesToScroll": 1, "dots": false, "arrows": true, "autoplay": true, "autoplaySpeed": 3000}';
        }
        ?>

        <div class="row">
          <div class="col">
            <div class="slick <?php echo get_sub_field('gallery_type') == 'two' ? 'two-gallery' : ''; ?>" data-slick='<?php echo $slickOptions; ?>'>

              <?php foreach ($photos as $photo) : ?>

                <div class="block-photo">
                  <img src="<?php echo $photo['url']; ?>" class="img-fluid" alt="<?php echo $photo['alt']; ?>">

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

              <?php endforeach; ?>

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

    <?php elseif ( get_row_layout() == 'content' ) : ?>

      <div class="block-content block-content-<?php the_sub_field('background'); ?>">
        <div class="row">
          <div class="col">
            <?php if ( get_sub_field('column_1') === 'content' ) : ?>
              <div class="content-text">
                <?php the_sub_field('content_1'); ?>
              </div>
            <?php elseif ( get_sub_field('column_1') === 'photo' ) : $photo1 = get_sub_field('photo_1'); ?>
              <div class="content-img">
                <img src="<?php echo $photo1['url']; ?>" class="img-fluid">
              </div>
            <?php endif; ?>
          </div><!-- .col -->
          <?php if ( get_sub_field('columns') != '1' ) : ?>
          <div class="col">
            <?php if ( get_sub_field('column_2') === 'content' ) : ?>
              <div class="content-text">
                <?php the_sub_field('content_2'); ?>
              </div>
            <?php elseif ( get_sub_field('column_2') === 'photo' ) : $photo2 = get_sub_field('photo_2'); ?>
              <div class="content-img">
                <img src="<?php echo $photo2['url']; ?>" class="img-fluid">
              </div>
            <?php endif; ?>
          </div><!-- .col -->
          <?php endif; ?>
          <?php if ( get_sub_field('columns') == '3' ) : ?>
          <div class="col">
            <?php if ( get_sub_field('column_3') === 'content' ) : ?>
              <div class="content-text">
                <?php the_sub_field('content_3'); ?>
              </div>
            <?php elseif ( get_sub_field('column_3') === 'photo' ) : $photo3 = get_sub_field('photo_3'); ?>
              <div class="content-img">
                <img src="<?php echo $photo3['url']; ?>" class="img-fluid">
              </div>
            <?php endif; ?>
          </div><!-- .col -->
          <?php endif; ?>
        </div><!-- .row -->
      </div><!-- .block-content -->

    <?php elseif ( get_row_layout() == 'bookmark' ) : ?>

      <div id="<?php the_sub_field('bookmark_id'); ?>" class="invisible">&nbsp;</div>

    <?php elseif ( get_row_layout() == 'video' ) : ?>

      <div class="row">
        <div class="col">
          <div class="block-video">
            <?php the_sub_field( 'video' ); ?>
          </div>
        </div>
      </div>

    <?php endif; ?>

  <?php endwhile; ?>

<?php else : ?>

  <?php the_content(); ?>

<?php endif; ?>
