<?php

/**
 * frondendie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package frondendie
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('frondendie_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function frondendie_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on frondendie, use a find and replace
		 * to change 'frondendie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('frondendie', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'frondendie'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'frondendie_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support('woocommerce');
	}
endif;
add_action('after_setup_theme', 'frondendie_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function frondendie_content_width()
{
	$GLOBALS['content_width'] = apply_filters('frondendie_content_width', 640);
}
add_action('after_setup_theme', 'frondendie_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function frondendie_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'frondendie'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'frondendie'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'frondendie_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function frondendie_scripts()
{
	wp_enqueue_style('frondendie-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('frondendie-style', 'rtl', 'replace');

	wp_deregister_script('jquery');
	wp_deregister_script('wp-embed-js');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), _S_VERSION, true);
	wp_enqueue_script('jquery');

	// wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/modal.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script('site-js', get_template_directory_uri() . '/js/function.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_style('swyper-style', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_script('swiper-slider', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('gsap', get_template_directory_uri() . '/js/gsap.min.js', '', _S_VERSION, true);
	wp_enqueue_script('gsap-st', get_template_directory_uri() . '/js/ScrollTrigger.min.js', '', _S_VERSION, true);
	wp_enqueue_script('gsap-observer', get_template_directory_uri() . '/js/Observer.min.js', '', _S_VERSION, true);

	if (is_front_page()) {
		wp_enqueue_style('frondendie-home', get_template_directory_uri() . '/css/home.css', array(), _S_VERSION);
		// wp_enqueue_script('gsap-smt', get_template_directory_uri() . '/js/smooth-scrollbar.js', '', _S_VERSION, true);
		wp_enqueue_script('home', get_template_directory_uri() . '/js/home.js', array(), _S_VERSION, true);
	}

	if (is_page('about')) {
		wp_enqueue_style('frondendie-about', get_template_directory_uri() . '/css/about.css', array(), _S_VERSION);
		wp_enqueue_script('about-scripts', get_template_directory_uri() . '/js/about.js', array(), _S_VERSION, true);
	}

	if (is_singular('post')) {
		wp_enqueue_style('frondendie-post', get_template_directory_uri() . '/css/post.css', array(), _S_VERSION);
		wp_enqueue_script('post-scripts', get_template_directory_uri() . '/js/post.js', array(), _S_VERSION, true);
	}

	if (is_singular('projects')) {
		wp_enqueue_style('frondendie-projects', get_template_directory_uri() . '/css/project.css', array(), _S_VERSION);
		wp_enqueue_script('projects-scripts', get_template_directory_uri() . '/js/project.js', array(), _S_VERSION, true);
	}

	if (is_singular('services')) {
		wp_enqueue_style('frondendie-services', get_template_directory_uri() . '/css/service.css', array(), _S_VERSION);
		wp_enqueue_script('marquee-scripts', get_template_directory_uri() . '/js/jquery.marquee.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('services-scripts', get_template_directory_uri() . '/js/service.js', array(), _S_VERSION, true);
	}

	if (is_home() && get_post_type() === 'post') {
		wp_enqueue_style('frondendie-blog', get_template_directory_uri() . '/css/blog.css', array(), _S_VERSION);
		wp_enqueue_script('blog-scripts', get_template_directory_uri() . '/js/blog.js', array(), _S_VERSION, true);
	}

	if (get_page_by_path('testimonials')) {
		wp_enqueue_style('frondendie-testimonials', get_template_directory_uri() . '/css/testimonials.css', array(), _S_VERSION);
		wp_enqueue_script('testimonials-scripts', get_template_directory_uri() . '/js/testimonials.js', array(), _S_VERSION, true);
	}

	if (get_page_by_path('portfolio')) {
		wp_enqueue_style('frondendie-portfolio', get_template_directory_uri() . '/css/portfolio.css', array(), _S_VERSION);
		wp_enqueue_script('portfolio-scripts', get_template_directory_uri() . '/js/portfolio.js', array(), _S_VERSION, true);
	}

	if (get_page_by_path('free-estimate')) {
		wp_enqueue_style('frondendie-estimate', get_template_directory_uri() . '/css/estimate.css', array(), _S_VERSION);
		wp_enqueue_script('estimate-scripts', get_template_directory_uri() . '/js/estimate.js', array(), _S_VERSION, true);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'frondendie_scripts');

function admin_scripts()
{
	if (is_admin()) {
		wp_enqueue_style('frondendie-admin-style', get_template_directory_uri() . '/css/admin.css', array(), _S_VERSION);
	}
}
add_action('admin_enqueue_scripts', 'admin_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom posts types register.
 */
require get_template_directory() . '/inc/custom-posts-types.php';

/**
 * SCF Home page.
 */
require get_template_directory() . '/scf/home.php';

/**
 * SCF Team single.
 */
require get_template_directory() . '/scf/team.php';

/**
 * SCF About page.
 */
require get_template_directory() . '/scf/about.php';

/**
 * SCF Review single.
 */
require get_template_directory() . '/scf/review.php';

/**
 * SCF Project category single.
 */
require get_template_directory() . '/scf/project-category.php';

/**
 * SCF Blog.
 */
require get_template_directory() . '/scf/blog.php';

/**
 * SCF project page.
 */
require get_template_directory() . '/scf/project.php';

/**
 * SCF service page.
 */
require get_template_directory() . '/scf/service.php';

/**
 * SCF testimonials archive.
 */
require get_template_directory() . '/scf/testimonials.php';

/**
 * SCF portfolio archive.
 */
require get_template_directory() . '/scf/portfolio.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Contacts page from admin
 */
add_action('init', function () {
	SCF::add_options_page('Contacts', 'Our Contacts', 'manage_options', 'our-contacts', 'dashicons-location-alt', 25);
});

/**
 * SCF Contact.
 */
require get_template_directory() . '/scf/contacts.php';

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

add_filter('excerpt_length', function () {
	return 15;
});

add_filter('excerpt_more', function ($more) {
	return '...';
});

add_action('init', 'frontendie_sorting_by_url');
function frontendie_sorting_by_url()
{
	add_rewrite_rule('blog/(.+?)/orderby/([^/]+)(/page/?([0-9]{1,}))?/?$', 'index.php?category_name=$matches[1]&paged=$matches[4]&orderby=$matches[2]', 'top');
	add_rewrite_rule('portfolio/(.+?)/orderby/([^/]+)(/page/?([0-9]{1,}))?/?$', 'index.php?project-category=$matches[1]&paged=$matches[4]&orderby=$matches[2]', 'top');
}

function reading_time($post_id)
{
	$content = get_the_content($post_id);
	$word_count = str_word_count(strip_tags($content));
	$readingtime = ceil($word_count / 200);
	echo '' . $readingtime . ' min';
}

function custom_posts_per_page($query)
{
	if (is_admin() || !$query->is_main_query())
		return;

	if (!is_admin() && $query->is_main_query() && is_post_type_archive('projects')) {
		$query->set('posts_per_page', 7);
		$query->set('post__in', SCF::get('projects__ids', PORTFOLIO_PAGE_ID));
		$query->set('orderby', 'post__in');
	}
	if (!is_admin() && $query->is_post_type_archive('reviews')) {
		$query->set('posts_per_page', 7);
		$query->set('post__in', SCF::get('reviews__ids', REVIEWS_PAGE_ID));
		$query->set('orderby', 'post__in');
	}
}
add_action('pre_get_posts', 'custom_posts_per_page');
