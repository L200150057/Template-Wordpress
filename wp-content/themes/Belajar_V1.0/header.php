<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'class-name' ); ?>>
    <div class="container">
      <div class="row" id="header-row">
        <div class="blog-header col-sm-4">
          <h1 class="blog-title"><?php bloginfo('name'); ?></h1>
          <p class="lead blog-description"><?php bloginfo('description'); ?></p>
        </div>
        <div class="blog-header col-sm-8" id="banner">
          <?php my_plugin_function() ?>
          <img src="<?php echo get_option('url'); ?>">
        </div>
      </div>
      <?php wp_get_nav_menu_items('home') ?>
      <div class="topnav" id="myTopnav">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="active">HOME</a>
        <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      </div>
    </div>

    <div class="container" id="main">
