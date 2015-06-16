<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
//wp_enqueue_script( 'jquery' );
wp_enqueue_script('bower',get_template_directory_uri().'/js/bower.min.js');
wp_enqueue_script('sitewide',get_template_directory_uri().'/js/sitewide.js');
wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
require_once(__DIR__.'/include/cpt.php');
require_once(__DIR__.'/include/wp_bootstrap_navwalker.php');

// include admin stuff


require_once(__DIR__.'/include/CCTheme_Admin.php');
require_once(__DIR__.'/include/CCTheme_Admin_conf.php');
// create it
CCTheme_Admin::getInstance();
add_action('cmb2_init', function() {
    $_ENV['FCC_FAQ_HEADERS_ORDERD']= array_map(function($val){return htmlentities($val,ENT_QUOTES);},array_map('trim', explode('|', cctheme_get_option('piped_cats'))));

    require_once(__DIR__.'/include/acf.php');

});
//require_once 'vendor/autoload.php';

require_once __DIR__.'/vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(__DIR__.'/twig_templates');
$twig = new Twig_Environment($loader, array(
'cache' => false//__DIR__.'/twig_cache',
));
require_once(__DIR__.'/gallery.php');
?>