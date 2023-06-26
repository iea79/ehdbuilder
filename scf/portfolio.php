<?php
if (!defined('PORTFOLIO_PAGE_ID')) {
	$current_page = get_page_by_path('portfolio');
	// var_dump($current_page->ID);
	define('PORTFOLIO_PAGE_ID', $current_page->ID);
}

function page_projects_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (PORTFOLIO_PAGE_ID == $id) {

		$Section = SCF::add_setting('projects-1', 'Page settings');

		$Section->add_group(
			'first-section',
			false,
			array(
				array(
					'name'        => 'first__title',
					'label'       => 'Default list title',
					'type'        => 'text',
				),
				array(
					'name'        => 'first__text',
					'label'       => 'Default list text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'first__img',
					'label'       => 'First background image',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'type'        => 'relation',
					'name'        => 'projects__ids',
					'label'       => 'Projects',
					'post-type'   => array('projects'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_projects_first_section_fields', 1, 5);
