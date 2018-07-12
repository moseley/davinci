</div><!-- #primary .container-fluid -->
  <div class="block-content block-content-<?php the_sub_field('background'); ?>">
    <div class="row no-gutters">
      <div class="col-sm">
        <?php if ( get_sub_field('column_1') === 'content' ) : ?>
          <div class="content-text">
            <?php the_sub_field('content_1'); ?>
          </div>
        <?php elseif ( get_sub_field('column_1') === 'photo' ) : $photo1 = get_sub_field('photo_1'); ?>
          <div class="content-img">
            <img src="<?php echo $photo1['url']; ?>" class="img-fluid">
          </div>
        <?php endif; ?>
      </div><!-- .col-sm -->
      <?php if ( get_sub_field('columns') != '1' ) : ?>
      <div class="col-sm">
        <?php if ( get_sub_field('column_2') === 'content' ) : ?>
          <div class="content-text">
            <?php the_sub_field('content_2'); ?>
          </div>
        <?php elseif ( get_sub_field('column_2') === 'photo' ) : $photo2 = get_sub_field('photo_2'); ?>
          <div class="content-img">
            <img src="<?php echo $photo2['url']; ?>" class="img-fluid">
          </div>
        <?php endif; ?>
      </div><!-- .col-sm -->
      <?php endif; ?>
      <?php if ( get_sub_field('columns') == '3' ) : ?>
      <div class="col-sm">
        <?php if ( get_sub_field('column_3') === 'content' ) : ?>
          <div class="content-text">
            <?php the_sub_field('content_3'); ?>
          </div>
        <?php elseif ( get_sub_field('column_3') === 'photo' ) : $photo3 = get_sub_field('photo_3'); ?>
          <div class="content-img">
            <img src="<?php echo $photo3['url']; ?>" class="img-fluid">
          </div>
        <?php endif; ?>
      </div><!-- .col-sm -->
      <?php endif; ?>
    </div><!-- .row -->
  </div><!-- .block-content -->
<div class="container-fluid">
