<?php
function service_first_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-1', 'First screen');

		$Section->add_group(
			'services_first',
			false,
			array(
				array(
					'name'        => 'service__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_first_fields', 1, 5);

function service_dream_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-2', 'Dream screen');

		$Section->add_group(
			'services_dream',
			false,
			array(
				array(
					'name'        => 'dream__subtitle',
					'label'       => 'Section top title',
					'type'        => 'text',
				),
				array(
					'name'        => 'dream__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'dream__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'dream__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'dream__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
				array(
					'name'        => 'dream__photo',
					'label'       => 'Section image 1',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'dream__photo_two',
					'label'       => 'Section image 2',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_dream_fields', 2, 5);

function service_materials_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-3', 'Materials screen');

		$Section->add_group(
			'services_materials',
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
					'name'        => 'materials__list_title',
					'label'       => 'Tab title',
					'type'        => 'text',
				),
				array(
					'name'        => 'materials__list_text',
					'label'       => 'Tab text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'materials__perks_list',
					'label'       => 'Tab perks list',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'materials__list_photo',
					'label'       => 'Tab image 1',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_materials_fields', 3, 5);

function service_steps_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-4', 'Steps screen');

		$Section->add_group(
			'services_steps',
			false,
			array(
				array(
					'name'        => 'steps__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__photo',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'steps__1_photo',
					'label'       => 'Step 1 image',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'steps__1_title',
					'label'       => 'Step 1 title',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__1_text',
					'label'       => 'Step 1 text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'steps__3_title',
					'label'       => 'Step materials title',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'steps_materials',
			true,
			array(
				array(
					'name'        => 'steps__materials_name',
					'label'       => 'Materials name',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__materials_photo',
					'label'       => 'Materials image',
					'type'        => 'image',
					'size'        => 'small',
				),
			)
		);

		$Section->add_group(
			'steps_process',
			false,
			array(
				array(
					'name'        => 'steps__process_title',
					'label'       => 'Process title',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__process_text',
					'label'       => 'Process text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'steps__process_photo_small',
					'label'       => 'Process image small',
					'type'        => 'image',
					'size'        => 'middle',
				),
				array(
					'name'        => 'steps__process_photo',
					'label'       => 'Process image',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$Section->add_group(
			'steps_gallery_stat',
			false,
			array(
				array(
					'name'        => 'steps__gallery_title',
					'label'       => 'Gallery title',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'steps_gallery',
			true,
			array(
				array(
					'name'        => 'steps__gallery_name',
					'label'       => 'Slide title',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__gallery_cat',
					'label'       => 'Slide category',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__gallery_text',
					'label'       => 'Slide text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'steps__gallery_photo',
					'label'       => 'Slide image',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$Section->add_group(
			'steps_link',
			false,
			array(
				array(
					'name'        => 'steps__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'steps__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_steps_fields', 4, 5);

function service_process_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-5', 'Our process screen');

		$Section->add_group(
			'services_process',
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
			)
		);

		$Section->add_group(
			'process_list',
			true,
			array(
				array(
					'name'        => 'process__list_icon',
					'label'       => 'Item icon',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'process__list_title',
					'label'       => 'Item title',
					'type'        => 'text',
				),
				array(
					'name'        => 'process__list_text',
					'label'       => 'Item text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_process_fields', 5, 5);

function service_additional_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-6', 'Additional services screen');

		$Section->add_group(
			'services_additional',
			false,
			array(
				array(
					'name'        => 'additional__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'additional__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'additional__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'additional_list',
			true,
			array(
				array(
					'name'        => 'additional__list_img',
					'label'       => 'Slide image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'additional__list_title',
					'label'       => 'Slide title',
					'type'        => 'text',
				),
				array(
					'name'        => 'additional__list_text',
					'label'       => 'Slide text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_additional_fields', 6, 5);

function service_spa_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-7', 'Po and spa screen');

		$Section->add_group(
			'services_spa',
			false,
			array(
				array(
					'name'        => 'spa__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'spa__subtitle',
					'label'       => 'Section subtitle',
					'type'        => 'text',
				),
				array(
					'name'        => 'spa__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$Section->add_group(
			'spa_list',
			true,
			array(
				array(
					'name'        => 'spa__list_img',
					'label'       => 'Item image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'spa__list_title',
					'label'       => 'Item title',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_spa_fields', 7, 5);

function service_faq_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'services' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('service-8', 'Faq screen');

		$Section->add_group(
			'services_faq',
			false,
			array(
				array(
					'name'        => 'faq__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'faq__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$Section->add_group(
			'faq_list',
			true,
			array(
				array(
					'name'        => 'faq__list_title',
					'label'       => 'Item title',
					'type'        => 'text',
				),
				array(
					'name'        => 'faq__list_text',
					'label'       => 'Item test',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'service_faq_fields', 8, 5);
