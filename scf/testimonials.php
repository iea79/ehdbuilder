<?php
if (!defined('REVIEWS_PAGE_ID')) {
	$current_page = get_page_by_path('testimonials');
	// var_dump($current_page->ID);
	define('REVIEWS_PAGE_ID', $current_page->ID);
}

function page_reviews_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (REVIEWS_PAGE_ID == $id) {

		$Section = SCF::add_setting('reviews-1', 'First section');

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
				array(
					'type'        => 'relation',
					'name'        => 'reviews__ids',
					'label'       => 'Reviews',
					'post-type'   => array('reviews'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_reviews_first_section_fields', 1, 5);
