<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" action="<?php echo site_url('/'); ?>" class="search-form form-inline">
  <div class="input-group">
    <div class="input-group-prepend">
      <button class="btn" type="submit"><?php echo davinci_get_svg( array( 'icon' => 'search' ) ); ?></button>
    </div>
    <input type="text" id="<?php echo $unique_id; ?>" class="form-control" value="<?php echo get_search_query(); ?>" name="s" />
  </div>
</form>
