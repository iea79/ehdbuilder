<?php
function project_first_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-1', 'Project first screen');

		$Section->add_group(
			'projects_first',
			false,
			array(
				array(
					'name'        => 'project__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'project__photo_small',
					'label'       => 'Small photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_first_fields', 1, 5);

function project_scope_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-2', 'Scope section');

		$Section->add_group(
			'scope_fields',
			false,
			array(
				array(
					'name'        => 'scope__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'scope__photo',
					'label'       => 'Section photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);


		$Section->add_group(
			'scope_list',
			true,
			array(
				array(
					'name'        => 'scope__list_item',
					'label'       => 'List text',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_scope_fields', 2, 5);

function project_materials_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-3', 'Materials section');

		$Section->add_group(
			'materials_fields',
			false,
			array(
				array(
					'name'        => 'materials__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
			)
		);


		$Section->add_group(
			'materials_list',
			true,
			array(
				array(
					'name'        => 'materials__list_item',
					'label'       => 'List text',
					'type'        => 'text',
				),
				array(
					'name'        => 'materials__photo',
					'label'       => 'List photo',
					'type'        => 'image',
					'size'        => 'small',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_materials_fields', 3, 5);

function project_process_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-4', 'Works process section');

		$Section->add_group(
			'process_fields',
			false,
			array(
				array(
					'name'        => 'process__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'process__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'process__photo',
					'label'       => 'Section photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'process__photo_small',
					'label'       => 'Section small photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_process_fields', 4, 5);

function project_gallery_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-5', 'Gsllery section');

		$Section->add_group(
			'gallery_fields',
			false,
			array(
				array(
					'name'        => 'gallery__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'gallery__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'gallery__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'gallery_list',
			true,
			array(
				array(
					'name'        => 'gallery__list_name',
					'label'       => 'Slide name',
					'type'        => 'text',
				),
				array(
					'name'        => 'gallery__list_label',
					'label'       => 'Slide label (After or before)',
					'type'        => 'text',
				),
				array(
					'name'        => 'gallery__list_img',
					'label'       => 'Slide image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_gallery_fields', 5, 5);

function project_like_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'projects' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('project-6', 'Projects section');

		$Section->add_group(
			'like_fields',
			false,
			array(
				array(
					'name'        => 'like__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'like__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'like__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'like__list',
					'label'       => 'Gallery',
					'post-type'   => array('projects'),
					'limit'       => 4,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_like_fields', 6, 5);
