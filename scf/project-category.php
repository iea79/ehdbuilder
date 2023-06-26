<?php
if (!defined('CAT_TYPE_NAME')) {
	define('CAT_TYPE_NAME', 'project-category');
}

function category_settings_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === CAT_TYPE_NAME && $meta_type = 'term') {

		$Section = SCF::add_setting('category-1', 'Category image');

		$Section->add_group(
			'category-section',
			false,
			array(
				array(
					'name'        => 'cat_img',
					'label'       => ' ',
					'type'        => 'image',
					'size'        => 'thumbnail',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'category_settings_fields', 10, 5);
