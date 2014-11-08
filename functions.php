<?php
/**
 * officina functions and definitions
 *
 * @package officina
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'officina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function officina_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on officina, use a find and replace
	 * to change 'officina' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'officina', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'officina' ),
		'secondary' => __( 'Menu Equipe', 'officina' ),
		'third' => __( 'Menu Book', 'officina' ),
		'fourth' => __( 'Menu Projets', 'officina' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

}
endif; // officina_setup
add_action( 'after_setup_theme', 'officina_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function officina_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'officina' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'officina_widgets_init' );

//we add support for thumbnails
add_theme_support( 'post-thumbnails' );


/**
 * Enqueue scripts and styles
 */
function officina_scripts() {

	wp_enqueue_style( 'officina-style', get_template_directory_uri() . '/css/build/minified/global.css', array(), '201404722', 'all' );


	// wp_enqueue_script( 'officina-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	//js for mousewheel
	// wp_enqueue_script( 'officina-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array( 'jquery' ), false, true );	
	
	//js for fancybox
	// wp_enqueue_script( 'officina-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
		
	//js for responsiveslides
	// wp_enqueue_script( 'officina-responsive-slides', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), '', true );
	
	//js for flexslider
	// wp_enqueue_script( 'officina-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '', true );
	
	// Enqueue carouFredSel
    // wp_enqueue_script( 'officina-jscrollpane', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js', array( 'jquery' ), '', true );	

	// wp_enqueue_script( 'officina-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    // Enqueue Google maps
	wp_enqueue_script( 'officina-GoogleMaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyArEmbqneDepMsMr0aZAYE-XAVxRsl2B9E&sensor=false', false );

	//modernizr
	wp_enqueue_script( 'officina-modernizr', get_template_directory_uri() . '/js/libs/modernizr.custom.63353.js', array(), '20140624', false );
	
	//Main JS
	wp_enqueue_script( 'officina-main', get_template_directory_uri() . '/js/build/production.min.js', array('jquery'), '20140413', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	// if ( is_singular() && wp_attachment_is_image() ) {
	// 	wp_enqueue_script( 'officina-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	// }
}
add_action( 'wp_enqueue_scripts', 'officina_scripts' );


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Customizer additions
 */
require( get_template_directory() . '/inc/customizer.php' );


//-------------------------------------------------  
//function custome Image
//-------------------------------------------------
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'imgProject', 500, 375, true );
}


//-------------------------------------------------  
//function for adding current classe to principal menu
// http://wordpress.stackexchange.com/questions/3014/highlighting-wp-nav-menu-ancestor-class-w-o-children-in-nav-structure
// Just add slug to current Menu
//-------------------------------------------------

add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
function current_type_nav_class($classes, $item) {
    $post_type = get_post_type();
    if ($item->attr_title != '' && $item->attr_title == $post_type) {
        array_push($classes, 'current-menu-item');
    };
    return $classes;
}

//------------------------------------------------------------
//function for adding current-cat class category Menu on Post
// http://wordpress.stackexchange.com/questions/98116/add-class-while-on-current-post-wp-list-categories
//------------------------------------------------------------


add_filter('wp_list_categories','style_current_cat_single_post');
// filter to add the .current-cat class to categories list in single post
function style_current_cat_single_post($output) {
    if( is_single() ) :
        global $post;
        foreach ( get_the_category($post->ID) as $cat ) {
            $cats[] = $cat->term_id;
        }
        foreach($cats as $value) {
            if(preg_match('#item-' . $value . '">#', $output)) {
            $output = str_replace('item-' . $value . '">', 'item-' . $value . ' current-cat">', $output);
            }
        }
    endif;
return $output;
}


//-------------------------------------------------  
//function for adding current classe Equipe menu
//-------------------------------------------------

function wp_list_post_types( $args ) {
    $defaults = array(
        'numberposts'  => -1,
        'offset'       => 0,
        'orderby'      => 'post_title',
        'order'		   => 'ASC',
        'post_type'    => 'projets',
        'depth'        => 0,
        'show_date'    => '',
        'date_format'  => get_option('date_format'),
        'child_of'     => 0,
        'exclude'      => '',
        'include'      => '',
        'title_li'     => __(''),
        'echo'         => 1,
        'link_before'  => '',
        'link_after'   => '',
        'exclude_tree' => '' );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    $output = '';
    $current_page = 0;

    // sanitize, mostly to keep spaces out
    $r['exclude'] = preg_replace('/[^0-9,]/', '', $r['exclude']);

    // Allow plugins to filter an array of excluded pages (but don't put a nullstring into the array)
    $exclude_array = ( $r['exclude'] ) ? explode(',', $r['exclude']) : array();
    $r['exclude'] = implode( ',', apply_filters('wp_list_post_types_excludes', $exclude_array) );

    // Query pages.
    $r['hierarchical'] = 0;
    $pages = get_posts($r);

    if ( !empty($pages) ) {
        if ( $r['title_li'] )
            $output .= '<li class="pagenav">' . $r['title_li'] . '<ul>';

        global $wp_query;
        if ( ($r['post_type'] == get_query_var('post_type')) || is_attachment() )
            $current_page = $wp_query->get_queried_object_id();
        $output .= walk_page_tree($pages, $r['depth'], $current_page, $r);

        if ( $r['title_li'] )
            $output .= '</ul></li>';
    }

    $output = apply_filters('wp_list_pages', $output, $r);

    if ( $r['echo'] )
        echo $output;
    else
        return $output;
}