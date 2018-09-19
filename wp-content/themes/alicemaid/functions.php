<?php
/**
  @ Thiết lập các hằng dữ liệu quan trọng
  @ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
  @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
  **/ 
  define('URL_THEME', get_stylesheet_directory());
  define('CORE',URL_THEME .'/core');

  /**
  @ Load file /core/init.php
  @ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
  **/
  require_once(CORE.'/init.php');
  /**
 @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/


  if (!isset($content_width)) {
    /*
        * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
        */
    $content_width=900;
  }

  /**
  @ Thiết lập các chức năng sẽ được theme hỗ trợ
  **/
  if (!function_exists('alicemaid')) {
    function alicemaid()
    {
      load_theme_textdomain( 'alice' );

      /*
      * Tự chèn RSS Feed links trong <head>
      */
      add_theme_support('automatic-feed-links');

      /*
      * Thêm chức năng post thumbnail
      */
      add_theme_support('post-thumbnails');

      /*
      * Thêm chức năng title-tag để tự thêm <title> 
      */
      add_theme_support('title-tag');
      // add_theme_support('menus');
      add_theme_support('post-formats',
                [
                  'image',
                  'video',
                  'gallery',
                  'quote',
                  'link'
                ]);
            /*
      * Tạo menu cho theme
      */
      register_nav_menu ( 'primary-menu', __('Primary Menu', 'alice') );

      /*
      * Tạo sidebar cho theme
      */
      $slidebar=[
            'name'=> __('Main Sidebar','alice'),
            'id' => 'main-sidebar',
            'class' => 'main-sidebar',
            'before-title' => '<h3 class="title">',
            'after-title' =>'</h3>'
            ];
      register_sidebar($slidebar);
      $sidebar_footer=[
            'name'=> __('Footer Sidebar','alice'),
            'id' => 'footer-sidebar',
            'class' => 'main-sidebar',
            'before-title' => '<h3 class="title">',
            'after-title' =>'</h3>'
            ];
      register_sidebar($sidebar_footer);
    }
    add_action('init','alicemaid');
  }
  if (! function_exists('alicemaid_logo')) {
    function alicemaid_logo()
    {?>
      <div class="logo">
        <a href="http://localhost/alice_blog/"><img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt="Logo"></a>
      </div>
      
    <?php }
  }
/**
@ Thiết lập hàm hiển thị shop
@ alicemaid_logo()
**/
if ( ! function_exists( 'alicemaid_car' ) ) {
  function alicemaid_car() {?>
    <div class="shop">
      <a href="#"><img src="<?php echo get_stylesheet_directory_uri()?>/images/shop.png" alt="My icon"></a>
      <button><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
  <?php }
}


  if ( ! function_exists( 'alicemaid_menu' ) ) {
      function alicemaid_menu($slug) {
        $menu = array(
          'theme_location' => $slug,
          'container' => 'nav',
          'container_class' => $slug,
        );
        wp_nav_menu( $menu );
     }
  }
  if (! function_exists('alicemaid_home')) {
    function alicemaid_home(){
      $home = get_bloginfo('url');
      // $title= the_title();
      if (is_home()) { ?>
        <li class="home-item"><a href="<?php echo $home ?>">Home</a></li>
        <li class="home-item">Blog</li>

        
      <?php }
      
        
        if (is_category()) {
          echo '<li class="home-item"><a href="'.$home.'">Home</a></li>';
          echo '<li class="home-item">'.the_category().'</li>';
        }
        if (is_single()) {
          echo '<li class="home-item"><a href="'.$home.'">Home</a></li>';
          echo '<li class="home-item">Blog</li>';?>
          <li class="home-item" aria-current="page"><?php echo the_title() ?></li>
          <?php
        }
        if (is_page()) {
                      echo '<li class="home-item">'.the_title().'</li>';
              }
              if (is_tag()) {
                single_tag_title();
              }
            if (is_day()) {
              echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';
            }
            if (is_month()) {
              echo"<li>Archive for "; the_time('F, Y'); echo'</li>';
            }
            if (is_year()) 
              {echo"<li>Archive for "; the_time('Y'); echo'</li>';
            }
            if (is_author()) {
              echo"<li>Author Archive"; echo'</li>';
            }
            if (isset($_GET['paged']) && !empty($_GET['paged'])) {
              echo "<li>Blog Archives"; echo'</li>';
            }
            if (is_search()) {
              echo"<li>Search Results"; echo'</li>';
            }
          
        }
          
  }

  /**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ alicemaid_thumbnail( $size )
**/
  if (!function_exists('alice_thumbnail')) {
    function alice_thumbnail($size){
      if ( has_post_thumbnail()||has_post_format('image')) {?>
        <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
        
      }
    }
  }

/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ alicemaid_entry_header()
**/
  if ( ! function_exists( 'alicemaid_entry_header' ) ) {
    function alicemaid_entry_header() {?>
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1><?php 
    }
  }

/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ alicemaid_entry_meta()
**/
  if (!function_exists("alicemaid_meta")) {
    function alicemaid_meta(){
      if (is_home()) {
        echo '<div class="meta">';
          printf(__('<span class="author"> <i class="fa fa-user" aria-hidden="true"></i>  %1$s</span>','alice'),get_the_author());
          printf(__('<span class="date"><i class="fa fa-calendar-o"></i> %1$s</span>','alice'),get_the_date());
        echo '</div>';
      }
      elseif (is_single()){
        echo '<div class="meta">';
          
          printf(__('<span class="date"><ion-icon name="calendar"></ion-icon> %1$s</span>','alice'),get_the_date());
          if (comments_open()) {
            echo '<span class="reply"><i class="fa fa-comment-o"></i> ';
              comments_popup_link(__('Leave a comment', 'alice'),
                         __('One comment', 'alice'),
                                __('% comments', 'alice'),
                               __('Read all comments', 'alice'));
            echo '</span>';
          }
          printf(__('<span class="author"><i class="fa fa-user-circle-o"></i> %1$s</span>','alice'),get_the_author());
        echo '</div>';
      }
    }
  }

/*
 * Thêm chữ Read More vào excerpt
 */
  function alice_readmore() {
      return '<div class="read"><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'alice') . '</a></div>';
  }
  add_filter( 'excerpt_more', 'alice_readmore' );

  /**
  @ Hàm hiển thị nội dung của post type
  @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
  @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
  @ alicemaid_entry_content()
  **/
  if ( ! function_exists( 'entry_content' ) ) {
    function alicemaid_entry_content() {
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();
      endif;
    }
  }

  /**
@ Hàm hiển thị tag của post
@ alicemaid_entry_tag()
**/
  if (!function_exists('alicemaid_entry_tag')) {
    function alicemaid_entry_tag(){
      if (has_tag() && is_single()) {
        echo '<div class="tag">';
        printf('Tags: %1$s',get_the_tag_list('',' , '));
        echo '</div>';
      }
    }
  }
  function alicemaid_contact(){ ?>
    <div id="contact">
      <ul>
        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
        <li><a href="#"><i class="fa fa-print"></i></a></li>
      </ul>
    </div><?php
  }
function alicemaid_styles() {
/*
 * Chèn file style.css chứa CSS của theme
 */
  wp_register_style('main-style',get_template_directory_uri().'/style.css','all');
  wp_enqueue_style('main-style');
  wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css','all');
  wp_enqueue_style('font-awesome');
  wp_register_style('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css','all');
  wp_enqueue_style('bootstrap-js');
  wp_register_script('js', get_template_directory_uri().'/js/menu.js',array('jquery'));
  wp_enqueue_script('js');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array('jquery'));
  wp_enqueue_script('jquery');
  wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js','all');
  wp_enqueue_style('bootstrap');
  wp_register_style('responsive',get_template_directory_uri().'/css/responsive.css','all');
  wp_enqueue_style('responsive');
}
add_action( 'wp_enqueue_scripts', 'alicemaid_styles' );
  
 ?>