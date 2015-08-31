<?php

// Customizer options function
// Removes and renames certain sections and options from the customizer
function wpt_register_theme_customizer( $wp_customize ) {

// Remove blogdescription option from customizer
$wp_customize->remove_control('blogdescription');
// Remove background image section
$wp_customize->remove_section('background_image');

// Rename Header option to Site Title
$wp_customize->get_section('title_tagline')->title = __('Site Title');
// Rename Colors section to something more descriptive
$wp_customize->get_section('colors')->title = __('Text and Background Color');
// Rename Header Image option to Jumbotron Image
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

// Background color options for customizer
$defaults = array(
  'default-color' => '#F1F1E9',
  );
add_theme_support( 'custom-background', $defaults );

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

// Function creates widgets
function create_widget( $name, $id, $description ) {

  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __( $description ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
    ));
}
// Register widgets here with parameters for create_widget function
create_widget( 'Blog Categories', 'blog-categories', 'Displays on the right inside the footer' );

// Loads theme CSS files. Add additional CSS files here.
function theme_styles() {

  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

}
add_action('wp_enqueue_scripts', 'theme_styles');

?>
