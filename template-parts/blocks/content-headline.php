</div><!-- #primary .container-fluid -->
<div class="bg-white">
  <div class="container-fluid">
    <div class="row">
      <?php if (get_sub_field('share')) : ?>
        <div class="col-sm-1 order-last">
          <div class="block-headline-share">
            <a class="addthis_button_compact">
              <img src="<?php echo get_theme_file_uri( '/assets/svg/share.svg' ); ?>" width="30" height="30" alt="Share">
            </a>
          </div>
        </div>
      <?php endif; ?>
      <div class="col">
        <div class="block-headline">
          <h2><?php the_sub_field('headline'); ?></h2>
          <p><?php the_sub_field('subline'); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
