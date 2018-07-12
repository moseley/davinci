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
      <div class="slick-block">
        <div class="slick <?php echo get_sub_field('gallery_type') == 'two' ? 'two-gallery' : ''; ?>" data-slick='<?php echo $slickOptions; ?>'>

          <?php foreach ($photos as $photo) : ?>

            <div class="block-photo">
              <?php if (substr($photo['description'], 0, 4) === 'http') : ?>
                <a href="<?php echo $photo['description']; ?>">
              <?php endif; ?>
              <img src="<?php echo $photo['url']; ?>" class="img-fluid" alt="<?php echo $photo['alt']; ?>">
              <?php if (substr($photo['description'], 0, 4) === 'http') : ?>
                </a>
              <?php endif; ?>

              <?php if (
                (
                  'na' != get_sub_field('overlay') &&
                  'two' == get_sub_field('gallery_type')
                )
                ||
                (
                  'text' == get_sub_field('overlay') &&
                  'full' == get_sub_field('gallery_type')

                )
              ) : ?>

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
        <?php if (
          'full' == get_sub_field('gallery_type') &&
          'text' != get_sub_field('overlay') &&
          (
            '' != get_sub_field('overlay_title') ||
            '' != get_sub_field('overlay_copy')
          )
        ) : ?>
          <div class="caption-<?php the_sub_field('overlay'); ?> caption-pos-<?php the_sub_field('position'); ?>">
            <?php if ( get_sub_field('overlay_title') ) : ?>
              <h3><?php the_sub_field('overlay_title'); ?></h3>
            <?php endif; ?>

            <?php if ( get_sub_field('overlay_copy') ) : ?>
              <?php the_sub_field('overlay_copy'); ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endif; ?>
