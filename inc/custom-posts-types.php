<?php
add_action('init', 'team_register_post_type_init'); // Использовать функцию только внутри хука init

function team_register_post_type_init()
{
	$labels = array(
		'name'			 	=> 'Team',
		'singular_name'	 	=> 'Team member', // админ панель Добавить->Функцию
		'add_new' 		 	=> 'Add team member',
		'add_new_item' 	 	=> 'Add new team member', // заголовок тега <title>
		'edit_item' 	 	=> 'Edit team member',
		'new_item'		 	=> 'New team member',
		'all_items'	  	 	=> 'All team members',
		'view_item'		 	=> 'Show team members in site',
		'search_items' 	 	=> 'Search team member',
		'not_found' 	 	=>  'Team member not found',
		'not_found_in_trash' => 'Team members not found in trash',
		'menu_name' 	 	=> 'Our team' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'menu_icon'			 => 'dashicons-groups', // иконка в меню
		'menu_position' 	 => 20, // порядок в меню
		'supports' 			 => array('title'),
		'taxonomies' 		 => array()
	);
	register_post_type('teams', $args);
}

// регистрирующая новые таксономии (create_projects_taxonomies)
add_action('init', 'create_projects_taxonomies');

// функция, создающая новые таксономии постов типа "projects"
function create_projects_taxonomies()
{

	// Добавляем НЕ древовидную таксономию 'project-category' (как метки)
	register_taxonomy('project-category', 'projects', array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x('Global categories', 'taxonomy general name'),
			'singular_name'               => _x('Global category', 'taxonomy singular name'),
			'search_items'                =>  __('Search Global categories'),
			'popular_items'               => __('Popular Global categories'),
			'all_items'                   => __('All Global categories'),
			'parent_item'                 => null,
			'parent_item_colon'           => null,
			'edit_item'                   => __('Edit Global category'),
			'update_item'                 => __('Update Global category'),
			'add_new_item'                => __('Add New Global category'),
			'new_item_name'               => __('New Global category Name'),
			'separate_items_with_commas'  => __('Separate global categories with commas'),
			'add_or_remove_items'         => __('Add or remove global category'),
			'choose_from_most_used'       => __('Choose from the most used global category'),
			'menu_name'                   => __('Global categories'),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'meta_box_cb'     => 'post_categories_meta_box',
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));
}

add_action('init', 'cases_register_post_type_init'); // Использовать функцию только внутри хука init

function cases_register_post_type_init()
{
	$labels = array(
		'name'			 	=> 'Projects',
		'singular_name'	 	=> 'Project', // админ панель Добавить->Функцию
		'add_new' 		 	=> 'Add project',
		'add_new_item' 	 	=> 'Add new project', // заголовок тега <title>
		'edit_item' 	 	=> 'Edit project',
		'new_item'		 	=> 'New project',
		'all_items'	  	 	=> 'All projects',
		'view_item'		 	=> 'Show projects in site',
		'search_items' 	 	=> 'Search project',
		'not_found' 	 	=>  'Project not found',
		'not_found_in_trash' => 'Projects not found in trash',
		'menu_name' 	 	=> 'Projects' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => '', 'with_front' => false),
		'capability_type'    => 'page',
		'has_archive'        => 'portfolio',
		// 'has_archive'        => false,
		'menu_icon'			 => 'dashicons-hammer', // иконка в меню
		'menu_position' 	 => 21, // порядок в меню
		'supports' 			 => array('title', 'thumbnail', 'page-attributes', 'excerpt'),
		'taxonomies' 		 => array('project-category')
	);
	register_post_type('projects', $args);
}

add_action('init', 'service_register_post_type_init'); // Использовать функцию только внутри хука init

function service_register_post_type_init()
{
	$labels = array(
		'name'			 	=> 'Services',
		'singular_name'	 	=> 'Service', // админ панель Добавить->Функцию
		'add_new' 		 	=> 'Add service',
		'add_new_item' 	 	=> 'Add new service', // заголовок тега <title>
		'edit_item' 	 	=> 'Edit service',
		'new_item'		 	=> 'New service',
		'all_items'	  	 	=> 'All services',
		'view_item'		 	=> 'Show services in site',
		'search_items' 	 	=> 'Search service',
		'not_found' 	 	=>  'Service not found',
		'not_found_in_trash' => 'Services not found in trash',
		'menu_name' 	 	=> 'Services' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => '', 'with_front' => false),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'menu_icon'			 => 'dashicons-hammer', // иконка в меню
		'menu_position' 	 => 22, // порядок в меню
		'supports' 			 => array('title', 'thumbnail', 'page-attributes'),
	);
	register_post_type('services', $args);
}

add_action('init', 'reviews_register_post_type_init'); // Использовать функцию только внутри хука init

function reviews_register_post_type_init()
{
	$labels = array(
		'name' => 'Reviews',
		'singular_name' => 'Review', // админ панель Добавить->Функцию
		'add_new' => 'Add review',
		'add_new_item' => 'Add new review', // заголовок тега <title>
		'edit_item' => 'Edit review',
		'new_item' => 'New review',
		'all_items' => 'All reviews',
		'view_item' => 'Show reviews in site',
		'search_items' => 'Search review',
		'not_found' =>  'Review not found',
		'not_found_in_trash' => 'Reviews not found in trash',
		'menu_name' => 'Reviews' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'page',
		// 'has_archive'        => false,
		'has_archive'        => 'testimonials',
		'menu_icon' => 'dashicons-admin-comments', // иконка в меню
		'menu_position' => 23, // порядок в меню
		'supports' => array('title')
	);
	register_post_type('reviews', $args);
}
