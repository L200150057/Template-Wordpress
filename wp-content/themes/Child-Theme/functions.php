<?php
  // Register Nav Walker class_alias
  require_once('wp_bootstrap_navwalker.php');

  // Theme Support
  function wpb_theme_setup(){
    add_theme_support('post-thumbnails');

    // Nav Menus
    register_nav_menus(array(
      'primary' => __('Primary Menu')
    ));

    // Post Formats
    add_theme_support('post-formats', array('aside', 'gallery'));
  }

  add_action('after_setup_theme','wpb_theme_setup');

// Excerpt Length Control
function set_excerpt_length(){
  return 14;
}

add_filter('excerpt_length', 'set_excerpt_length');

// Widget Locations
function wpb_init_widgets($id){
  register_sidebar(array(
    'name'  => 'Sidebar',
    'id'    => 'sidebar',
    'before_widget' => '<div class="sidebar-module">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="header-widget">',
    'after_title'   => '<hr/></div>'
  ));
}

add_action('widgets_init', 'wpb_init_widgets');

// Customizer File
require get_template_directory(). '/inc/customizer.php';

// Enqueue Function untuk bootstrap
function bootstrap_autoload() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js');
    wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.slim.min.js');
}
add_action('wp_enqueue_scripts', 'bootstrap_autoload');

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
  add_dashboard_page('Setting', 'Setting Theme', 'read', 'my-unique-identifier', 'my_plugin_function');
}

function my_plugin_function(){

  if (isset($_POST['submit'])){
    $url = "url";
    $url_save = $_POST['url'];
    update_option($url, $url_save);    
  }

  if (is_admin()){
    echo '
    <div class="wrap">
      <div class="postbox">
        <h2 class="hndle"><span>Change Header-Image</span></h2>
        <div class="inside">
          <div class="main">
          <form method="post" id="frm" name="frm">
            Header-Image : <input type="url" placeholder="Masukan Url Gambar" id="url" value="'.get_option('url').'" name="url"/>          
            <input class="button button-primary" type="submit" name="submit" />
          </form>
          </div>
        </div>
      </div>
    </div>
    ';
  }
    
}