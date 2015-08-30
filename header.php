<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php bloginfo( 'name' ) ?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>

<h1 class="site-title">
  <a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'title' ); ?></a>
</h1>
