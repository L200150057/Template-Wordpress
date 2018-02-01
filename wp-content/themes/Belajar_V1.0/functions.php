<?php
  // Register Nav Walker class_alias
  require_once('wp_bootstrap_navwalker.php');

  // Theme Support
  function wpb_theme_setup(){
    add_theme_support('post-thumbnails');

    // Nav Menus
    register_nav_menus(array(
      'primary' => 'Primary Menu',
      'secondary' => 'Secondary Menu'
    ));

    
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
  add_theme_page('Setting Theme', 'Setting Theme', 'read', 'my-unique-identifier', 'my_plugin_function');
}

// Setting Tema
function my_plugin_function(){
  
  if (isset($_POST['submit'])){
    $url = "url";
    $about = "about";
    $navbar1 = "navbar1";
    $url_save = $_POST['url'];
    $about_save = $_POST['about'];
    $a = ($url_save != "" ? update_option($url, $url_save) : false);
    $b = ($about_save != "" ? update_option($about, $about_save) : false);
  }

  if (is_admin()){
    echo '
    <style>
      .hndle span{padding: 0px 10px}
    </style>
    <div class="wrap">
      <div class="postbox">
        <h2 class="hndle ui-sortable-handle"><span>Change Header-Image</span></h2>
        <div class="inside">
          <div class="main">
          <form method="post" id="frm" name="frm">
            Header-Image : <input type="url" placeholder="Masukan Url Gambar" id="url" value="'.get_option('url').'" name="url"/>          
            <input class="button button-primary" type="submit" name="submit" />
          </form>
          </div>
        </div>
      </div>
      <div class="postbox">
        <h2 class="hndle"><span>About Website</span></h2>
        <div class="inside">
          <div class="main">
          <form method="post" id="frm" name="frm">
            <textarea name="about" cols="100%" rows="10">'.get_option('about').'</textarea>
            <input class="button button-primary" type="submit" name="submit" />
          </form>
          </div>
        </div>
      </div>
      <div class="postbox">
        <h2 class="hndle"><span>Navbar Setting</span></h2>
        <div class="inside">
          <div class="main">
          <input type="text" name="navbar1" value="'.get_option('navbar1').'">
          </div>
        </div>
      </div>
    </div>
    ';
  }
    
}

// Pagination numerik
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>...</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>...</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

//Tomblo Share
function share(){
  $permalink = urlencode(get_permalink());
  $title = $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
  $FBURL = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;
  $GURL = 'https://plus.google.com/share?url='.$permalink;
  $TURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$permalink.'&amp;via=Crunchify';
  $share_button = '';
  $share_button .= '<a class="btn btn-success" href="'.$FBURL.'">FACEBOOK</a>';
  $share_button .= '<a class="btn btn-success" href="'.$GURL.'">GOOGLE+</a>';
  $share_button .= '<a class="btn btn-success" href="'.$TURL.'">TWITTER</a>';
  return $share_button;
}

// Mendapatkan gambar pertama sebagai thumbnail
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

//Title Tag
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


/**
 * Add .js script if "Enable threaded comments" is activated in Admin
 * Codex: {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
 */
function wpse218049_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'wpse218049_enqueue_comments_reply' );

// automatic-feed-links
add_theme_support( 'automatic-feed-links' ); 

if ( ! isset( $content_width ) ) $content_width = 900;