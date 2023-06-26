<?php
if (!defined('BLOG_PAGE_ID')) {
	$current_page = get_page_by_path('blog');
	// var_dump($current_page->ID);
	define('BLOG_PAGE_ID', $current_page->ID);
}

function page_blog_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (BLOG_PAGE_ID == $id) {

		$Section = SCF::add_setting('blog-1', 'First section');

		$Section->add_group(
			'first-section',
			false,
			array(
				array(
					'name'        => 'first__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'first__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_blog_first_section_fields', 1, 5);
