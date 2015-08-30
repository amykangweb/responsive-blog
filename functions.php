<?php

// Customizer options

function wpt_register_theme_customizer( $wp_customize ) {

// Remove blogdescription option from customizer
$wp_customize->remove_control('blogdescription');

// Rename Header option to Site Title
$wp_customize->get_section('title_tagline')->title = __('Site Title');
$wp_customize->get_section('header_image')->title = __('Jumbotron Image');
}

add_action( 'customize_register', 'wpt_register_theme_customizer' );

// Add Header Image options to customizer
// Allows customization of image and site header text color
// Lets user know what height and width the image should be
$defaults = array(
  'default-image' => get_template_directory_uri() .'/images/rainy.jpg',
  'default-text-color' => '#36b55c',
  'height' => 500,
  'width' => 1900,
  'header-text' => true,
  'uploads' => true,
  'wp-head-callback' => 'wpt_style_header',
  );

add_theme_support( 'custom-header', $defaults );

// Function for updating header styles
function wpt_style_header() {

    $text_color = get_header_textcolor();
    ?>

    <style type="text/css">

    .site-title a {
      color: #<?php echo esc_attr( $text_color ); ?>;
    }

    <?php if( display_header_text() != true ): ?>
    .site-title {
      display: none;
    }
    <?php endif; ?>

    </style>
    <?php
}

// loads theme css files
function theme_styles() {

  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

}

add_action('wp_enqueue_scripts', 'theme_styles');

?>
