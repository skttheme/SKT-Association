<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_association_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_association_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_association_content_width', 640 );
	load_theme_textdomain( 'skt-association', get_stylesheet_directory_uri() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 55,
		'width'       => 226,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-association' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f7fafc'
	) );
} 
endif; // skt_association_setup
add_action( 'after_setup_theme', 'skt_association_setup' );

function skt_activism_lite_remove_parent_tgmpa() {
    remove_action( 'tgmpa_register', 'skt_activism_lite_register_required_plugins' );
}
add_action( 'after_setup_theme', 'skt_activism_lite_remove_parent_tgmpa', 1 );

function skt_association_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skt-association' ),
		'description'   => esc_html__( 'Appears on sidebar', 'skt-association' ),
		'id'            => 'fc-pln-sidebar',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-association' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-association' ),
		'id'            => 'fc-1-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-association' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-association' ),
		'id'            => 'fc-2-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-association' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-association' ),
		'id'            => 'fc-3-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-association' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-association' ),
		'id'            => 'fc-4-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'skt_association_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_association_enqueue_styles' );
function skt_association_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_association_child_styles', 99);
function skt_association_child_styles() {
  wp_enqueue_style( 'skt-association-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_association_admin_style() {
  wp_enqueue_script('skt-association-admin-script', get_stylesheet_directory_uri()."/js/skt-association-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_association_admin_style');

function skt_association_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_association_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-association-about-page-style', get_stylesheet_directory_uri() . '/css/skt-association-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_association_admin_about_page_css_enqueue' );

function skt_association_admin_css_style() {
  wp_enqueue_style('skt-association-admin-style', get_stylesheet_directory_uri()."/css/skt-association-admin-style.css");
}
add_action('admin_enqueue_scripts', 'skt_association_admin_css_style');

function skt_association_dequeue_skt_activism_lite_custom_js() {
	wp_dequeue_script( 'skt-activism-lite-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_dequeue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'skt_association_dequeue_skt_activism_lite_custom_js', 20 );

add_action( 'wp_enqueue_scripts', 'skt_association_child_navigation', 99);
function skt_association_child_navigation() {
  wp_enqueue_script('skt-association-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true );
  wp_enqueue_script('skt-association-navigation-js', get_stylesheet_directory_uri() . '/js/navigation.js', array('jquery'), null, true );
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_association_activation_notice' );
}
function skt_association_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-association-notice-container">
        	<div class="skt-association-notice-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-association-notice-content">
            <div class="skt-association-notice-heading"><?php echo esc_html__('Thank you for installing SKT Association!', 'skt-association'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT Association comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-association'); ?></p>
            </div>
            <div class="skt-association-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_association_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_association_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function skt_association_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'skt_association_load_dashicons', 999);

/**
 * Retrieve webfont URL to load fonts locally.
 */
/**
* Enqueue theme fonts.
*/
function skt_association_fonts() {
$fonts_url = skt_association_get_fonts_url();

// Load Fonts if necessary.
if ( $fonts_url ) {
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	wp_enqueue_style( 'skt-association-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
}
}
add_action( 'wp_enqueue_scripts', 'skt_association_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'skt_association_fonts', 1 );
 
function skt_association_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
		'Anton:200,300,400,500,600,700,800',
		'Oswald:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'skt_association_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

define('SKT_ASSOCIATION_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_ASSOCIATION_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/association-wordpress-theme/');
define('SKT_ASSOCIATION_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-community-wordpress-theme/');
define('SKT_ASSOCIATION_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/skt-association-doc/');
define('SKT_ASSOCIATION_SKTTHEMES_LIVE_DEMO','https://sktperfectdemo.com/themepack/association/');
define('SKT_ASSOCIATION_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_ASSOCIATION_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_association_remove_parent_function(){	 
	remove_action( 'admin_notices', 'skt_activism_lite_activation_notice');
	remove_action( 'admin_menu', 'skt_activism_lite_abouttheme');
	remove_action( 'customize_register', 'skt_activism_lite_customize_register');
	remove_action( 'wp_enqueue_scripts', 'skt_activism_lite_custom_css');
}
add_action( 'init', 'skt_association_remove_parent_function' );

function skt_association_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'skt_activism_lite_setup' );
}
add_action( 'after_setup_theme', 'skt_association_remove_parent_theme_stuff', 0 );

function skt_association_unregister_widgets_area(){
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_association_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';

function skt_association_enqueue_comment_reply_script() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'skt_association_enqueue_comment_reply_script' );

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php'; // Make sure this file exists in your child theme

add_action( 'tgmpa_register', 'skt_association_register_required_plugins' );

function skt_association_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		)		 				
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'skt-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}