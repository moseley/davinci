<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
      <img src="<?php echo get_theme_file_uri( '/assets/svg/davinci_custom_fireplaces.svg' ); ?>" width="300" height="112">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      wp_nav_menu( [
      'theme_location'  => 'header',
      'container'       => false,
      'menu_id'         => false,
      'menu_class'      => 'navbar-nav ml-auto',
      'depth'           => 3,
      'fallback_cb'     => 'Bootstrap_Nav_Walker::fallback',
      'walker'          => new Bootstrap_Nav_Walker()
      ] ); ?>
    </div>
  </nav>
<div id="primary" class="container-fluid">
