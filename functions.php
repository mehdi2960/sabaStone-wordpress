<?php
function shop_setup()
{
    load_theme_textdomain('dokmeh', get_template_directory() . '/languages');
    if (!defined('_S_VERSION')) {
        define('_S_VERSION', '1.1.7');
    }
    $menus = array(
        'top_menu' => 'منوی بالا',
        'bottom_menu' => 'منوی پابرگ'
    );
    register_nav_menus($menus);

    add_image_size('post_image_box', 270, 270, true);
    add_image_size('image_sidebar', 60, 60, true);
    add_image_size('image_sidebar_dor', 400, 250, true);
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'shop_setup');

/////////////////////////////////////////////////
define('ThemeURI', get_template_directory() . '/');
define('ThemeURL', get_template_directory_uri() . '/');
define('ThemeAssets', ThemeURL . 'assets/');
function ThemeAssets($url)
{
    echo ThemeAssets . $url;
}
///////////////////////////////////////////////
//-------------- SVG Support ----------------//
///////////////////////////////////////////////
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/////////////////////////////////////////////////
function sabastone_scripts_style()
{
    wp_enqueue_script('frontend-ajax', get_template_directory_uri() . '/assets/js/frontend-ajax.js', array('jquery'), null, true);
    wp_localize_script('frontend-ajax', 'frontend_ajax_object',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap.rtl.min.css');
    if(!is_post_type_archive('project')):
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css');
    endif;
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    if (!is_post_type_archive('product') AND !is_home() AND !is_page_template('about-us.php')):
    wp_enqueue_style('locomotive', get_template_directory_uri() . '/assets/css/locomotive-scroll.css');
    endif;
    wp_enqueue_style('plyr', get_template_directory_uri() . '/assets/css/plyr.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_style_add_data('style', 'rtl', 'replace');
    if(!is_post_type_archive('project')):
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), false, true);
    endif;
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('circletype', get_template_directory_uri() . '/assets/js/circletype.min.js', array(), false, true);
    wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), false, true);
    wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/js/jQuery.min.js', array(), false, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), false, true);
    if (!is_post_type_archive('product') AND !is_home() AND !is_page_template('about-us.php')):
      wp_enqueue_script('locomotive', get_template_directory_uri() . '/assets/js/locomotive-scroll.js', array(), false, true);
    endif;
    wp_enqueue_script('plyr', get_template_directory_uri() . '/assets/js/plyr.js', array(), false, true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true);
    wp_enqueue_script('vanilla', get_template_directory_uri() . '/assets/js/vanilla-tilt.babel.min.js', array(), false, true);
    if(is_rtl()) {
        wp_enqueue_script('persianumber', get_template_directory_uri() . '/assets/js/persianumber.js', array(), false, true);
    }
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jQuery'),false, true);
}


add_action('wp_enqueue_scripts', 'sabastone_scripts_style');



require_once dirname( __FILE__ ) . '/cmb2/init.php';
require_once dirname( __FILE__ ) . '/inc/theme-options.php';
require_once dirname( __FILE__ ) . '/inc/project-posttype.php';
require_once dirname( __FILE__ ) . '/inc/products-posttype.php';
require_once dirname( __FILE__ ) . '/inc/custom_taxonomy_products.php';
require_once dirname( __FILE__ ) . '/inc/project-metabox.php';

///////////////////////////////////////////////
//----------- ACF INIT GOOGLE MAP -----------//
///////////////////////////////////////////////
function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyDJJnpil_L6C_1YN1AatPFh7rT0QKZKso0');
}

add_action('acf/init', 'my_acf_init');

///////////////////////////////////////////////
//-------------- THEME SETTING --------------//
///////////////////////////////////////////////
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Setting',
        'menu_title' => 'Theme Setting',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'	 => false,
        'icon_url'   => 'dashicons-images-dokmeh',
        'position'   => 3
    ));
}

// ------------------ Filter Products ------------------------
function product_filter_function()
{
    $catID = intval($_POST['catID']);

   if($catID){
       $args = array(
           'post_type' => 'products',
           'posts_per_page' => -1,
           'post_status' => 'publish',
           'tax_query' => array(
               array(
                   'taxonomy' => 'product-types',
                   'field' => 'term_id',
                   'terms' => $catID,
               ),
           ),
       );
   }
    wp_reset_postdata();
    $products= new WP_Query($args);

    $outPutHTML = '';
    $count = 0;

    if ($products->have_posts()):
        $count = $products->found_posts;
        while ($products->have_posts()):$products->the_post();
            $post_ID = get_the_ID();

            $outPutHTML .= '<div class="col">';
            $outPutHTML .= ' <a href="'.get_the_permalink().'" class="product-box">';
            $outPutHTML .= ' <div class="product-box-img" data-tilt data-tilt-perspective="500">';
            $outPutHTML .= get_the_post_thumbnail($post_ID,'large');
            $outPutHTML .= ' </div>';
            $outPutHTML .= '<span class="product-name">'.get_the_title().'</span>';
            $outPutHTML .= '</a></div>';
        endwhile;
        wp_reset_postdata();
    endif;
    if ($count == 0) {
        $outPutHTML = "<p class='not-found-text'>" . __('Sorry, No products found. Please choose another category.', 'dokmeh') . "</p>";
    }
    $results = array();
    $results ['count'] = $count;
    $results ['content'] = $outPutHTML;
    wp_die(json_encode($results));

}
add_action('wp_ajax_product_filter','product_filter_function');
add_action('wp_ajax_nopriv_product_filter','product_filter_function');

//////////////////////////////////////postFilter/////////////////////////////////
function page_filter_function()
{
    $catID = intval($_POST['catID']);

    if($catID){
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'category__in' => $catID
        );
    }
    wp_reset_postdata();
    $posts= new WP_Query($args);

    $outPutHTML = '';
    $count = 0;

    if ($posts->have_posts()):
        $count = $posts->found_posts;
        while ($posts->have_posts()):$posts->the_post();
            $post_ID = get_the_ID();

            $outPutHTML .= '<div class="col-12 col-md-6 col-lg-4">';
            $outPutHTML .= ' <a href="'.get_the_permalink().'" class="blog-box">';
            $outPutHTML .= '<div class="blog-media" data-aos="zoom-in">';
            $outPutHTML .= get_the_post_thumbnail($post_ID,'large');
            $outPutHTML .= '</div>';
            $outPutHTML .= '<div class="blog-content" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">';
            $outPutHTML .= '<h2>'.get_the_title().'</h2>';
            $outPutHTML .= ' <p>';
            $outPutHTML .= get_the_excerpt();
            $outPutHTML .= '</p>';
            $outPutHTML .= '</div></a></div>';
        endwhile;
        wp_reset_postdata();
    endif;
    if ($count == 0) {
        $outPutHTML = "<p class='not-found-text'>" . __('Sorry, No products found. Please choose another category.','dokmeh') . "</p>";
    }
    $results = array();
    $results ['count'] = $count;
    $results ['content'] = $outPutHTML;
    wp_die(json_encode($results));

}
add_action('wp_ajax_page_filter','page_filter_function');
add_action('wp_ajax_nopriv_page_filter','page_filter_function');

////////////////////////////////////////////////////////////////////////////////////////////////