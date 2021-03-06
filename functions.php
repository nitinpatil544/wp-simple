<?php
/**
 * wp-simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp-simple
 */
if ( !function_exists( 'wp_simple_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_simple_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wp-simple, use a find and replace
		 * to change 'wp-simple' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-simple', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp-simple' ),
			'menu-2' => esc_html__( 'Footer', 'wp-simple' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_simple_custom_background_args', array(
			'default-color'	 => 'ffffff',
			'default-image'	 => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

endif;
add_action( 'after_setup_theme', 'wp_simple_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_simple_content_width() {
	$GLOBALS[ 'content_width' ] = apply_filters( 'wp_simple_content_width', 640 );
}

add_action( 'after_setup_theme', 'wp_simple_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_simple_widgets_init() {
	register_sidebar( array(
		'name'			 => esc_html__( 'Sidebar', 'wp-simple' ),
		'id'			 => 'sidebar-1',
		'description'	 => esc_html__( 'Add widgets here.', 'wp-simple' ),
		'before_widget'	 => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</section>',
		'before_title'	 => '<h2 class="widget-title">',
		'after_title'	 => '</h2>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Footer Widgets', 'wp-simple' ),
		'id'			 => 'sidebar-2',
		'description'	 => esc_html__( 'Add widgets here.', 'wp-simple' ),
		'before_widget'	 => '<section id="%1$s" class="widget grid-cell sm-grid-1-2 md-grid-1-2 lg-grid-1-4 %2$s">',
		'after_widget'	 => '</section>',
		'before_title'	 => '<h2 class="widget-title">',
		'after_title'	 => '</h2>',
	) );
}

add_action( 'widgets_init', 'wp_simple_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_simple_scripts() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'wp-slick-theme', get_template_directory_uri() . '/css/slick-theme.css' );

	wp_enqueue_style( 'wp-slick', get_template_directory_uri() . '/css/slick.css' );

	wp_enqueue_style( 'wp-simple-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wp-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), true );

	wp_enqueue_script( 'wp-slick-slider', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), true );

	wp_enqueue_script( 'wp-simple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wp-simple-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_simple_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * mytheme_customize_register
 */

add_action( 'customize_register', 'my_theme_options' );

function my_theme_options( $wp_customize ) {
	// Sections, settings and controls will be added here

	$wp_customize->add_section(
	'mytheme_footer_options', array(
		'title'			 => __( 'Footer Settings', 'mytheme' ),
		'priority'		 => 100,
		'capability'	 => 'edit_theme_options',
		'description'	 => __( 'Change footer options here.', 'mytheme' ),
	)
	);

	$wp_customize->add_setting( 'footer_bg_color', array(
		'default' => 'f5f5f5'
	)
	);

	$wp_customize->add_setting( 'footer_content', array(
		'default' => 'sagar'
	) );

	$wp_customize->add_setting( 'footer_logo' );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'footer_bg_color_control', array(
		'label'		 => __( 'Footer Background Color', 'mytheme' ),
		'section'	 => 'mytheme_footer_options',
		'settings'	 => 'footer_bg_color',
		'priority'	 => 10,
	)
	) );


	$wp_customize->add_control( 'footer_content', array(
		'label'		 => __( 'Copyright content' ),
		'type'		 => 'textarea',
		'section'	 => 'mytheme_footer_options',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo', array(
		'label'		 => __( 'Featured Home Page Image', 'theme_textdomain' ),
		'section'	 => 'mytheme_footer_options',
		'mime_type'	 => 'image',
	) ) );
}

function my_dynamic_css() {
	?>
	<style type='text/css'>
		.sagar {}
		#fatfooter {
			background-color: <?php echo get_theme_mod( 'footer_bg_color' ) ?> ;
		}
	</style>
	<?php
}

add_action( 'wp_head', 'my_dynamic_css' );

/*
 * custom_excerpt_length
 */

function custom_excerpt_length( $length ) {
	return 25;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
