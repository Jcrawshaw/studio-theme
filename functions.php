<?php

function wpt_register_theme_customizer( $wp_customize ) {

  //var_dump( $wp_customize );

  // Customize title and tagline sections and labels
  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'wptthemecustomizer');
  $wp_customize->get_control('blogname')->label = __('Site Name', 'wptthemecustomizer');
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'wptthemecustomizer');


  // Customize Background Settings
  $wp_customize->get_section('background_image')->title = __('Background Styles', 'wptthemecustomizer');
  $wp_customize->get_control('background_color')->section = 'background_image';

}
add_action( 'customize_register', 'wpt_register_theme_customizer' );


//Add theme support for Custom Backgrounds
$defaults = array(
  'default-color' => '#efefef',
  'default-image' => get_template_directory_uri() . '/images/background2.png',
  );
add_theme_support( 'custom-background', $defaults );


//Enqueue Theme styles
function theme_styles() {

  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/css/bootstrap.min.css' );
  wp_enqueue_style( 'main_css', get_template_directory_uri() .'/style.css' );
  wp_enqueue_style( 'marker-font', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
  wp_enqueue_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto' );
  wp_enqueue_style( 'destain-font', get_stylesheet_directory_uri() . '/fonts/stylesheet.css', array(), '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

  global $wp_scripts;

  wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
  wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );

  $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
  $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js');

//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

function register_theme_menus() {
  register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );

function create_widget($name, $id, $description) {

  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __( $description ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
    ));
}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left side of the home page');
create_widget( 'Front Page Middle', 'front-middle', 'Displays in the middle of the home page');
create_widget( 'Front Page Right', 'front-right', 'Displays on the right side of the home page');

create_widget( 'Page Sidebar', 'page', 'Displays on pages with a sidebar');

create_widget( 'Blog Sidebar', 'blog', 'Displays on the blog listing page');


?>