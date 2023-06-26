<?php
if (!defined('HOME_ID')) {
	$homeId = get_option('page_on_front');
	define('HOME_ID', $homeId);
}
// echo HOME_ID;

function home_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($type);
	// echo $id;
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-1', 'First section');

		$Section->add_group(
			'first-section',
			false,
			array(
				array(
					'name'        => 'first__title',
					'label'       => 'First section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'first__text',
					'label'       => 'First section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'first__img',
					'label'       => 'First section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'first__btn',
					'label'       => 'First section button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'first__btn_link',
					'label'       => 'First section button link',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_first_section_fields', 1, 5);

function home_team_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($type);
	// echo $id;
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-2', 'Team section');

		$Section->add_group(
			'team-section',
			false,
			array(
				array(
					'name'        => 'team__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'team__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'team__btn',
					'label'       => 'Section button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'team__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'team__members',
					'label'       => 'Team members',
					'post-type'   => array('teams'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_team_section_fields', 2, 5);

function home_outdor_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-3', 'Outdoor section');

		$Section->add_group(
			'outdor-section',
			false,
			array(
				array(
					'name'        => 'outdor__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'outdor__anchore',
					'label'       => 'Section subtitle',
					'type'        => 'text',
				),
				array(
					'name'        => 'outdor__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'outdor__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_outdor_section_fields', 3, 5);

function home_project_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-4', 'Projects section');

		$Section->add_group(
			'project-section',
			false,
			array(
				array(
					'name'        => 'project__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'project_list',
			true,
			array(
				array(
					'name'        => 'project__img',
					'label'       => 'Project image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'project__name',
					'label'       => 'Project name',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_project_section_fields', 4, 5);

function home_why_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-5', 'Why us section');

		$Section->add_group(
			'why-section',
			false,
			array(
				array(
					'name'        => 'why__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'why_list',
			true,
			array(
				array(
					'name'        => 'why__img',
					'label'       => 'why image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'why__name',
					'label'       => 'why name',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_why_section_fields', 5, 5);

function gallery_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-6', 'Gallery section');

		$Section->add_group(
			'gallery-section',
			false,
			array(
				array(
					'name'        => 'gallery__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'type'        => 'taxonomy',
					'name'        => 'gallery__cat',
					'label'       => 'Progect categories',
					'taxonomy'    => array('project-category'),
					'limit'       => 3,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'gallery_section_fields', 6, 5);

function home_process_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-7', 'Process section');

		$Section->add_group(
			'process-section',
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
					'name'        => 'process__btn',
					'label'       => 'Section button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'process__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
				array(
					'name'        => 'process__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$Section->add_group(
			'process_list',
			true,
			array(
				// array(
				// 	'name'        => 'process__img',
				// 	'label'       => 'process image',
				// 	'type'        => 'image',
				// 	'size'        => 'medium',
				// ),
				array(
					'name'        => 'process__name',
					'label'       => 'Step name',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_process_section_fields', 7, 5);

function home_spring_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-8', 'Spring section');

		$Section->add_group(
			'spring-section',
			false,
			array(
				array(
					'name'        => 'spring__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'spring__price',
					'label'       => 'Section price',
					'type'        => 'text',
				),
				array(
					'name'        => 'spring__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'spring__btn',
					'label'       => 'Section button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'spring__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
				array(
					'name'        => 'spring__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_spring_section_fields', 8, 5);

function home_manufacture_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-9', 'Manufactures section');

		$Section->add_group(
			'manufacture-section',
			false,
			array(
				array(
					'name'        => 'manufacture__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'manufacture__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$Section->add_group(
			'manufacture_list',
			true,
			array(
				array(
					'name'        => 'manufacture__list_title',
					'label'       => 'Manufacture title',
					'type'        => 'text',
				),
				array(
					'name'        => 'manufacture__list_img',
					'label'       => 'Manufacture image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_manufacture_section_fields', 9, 5);

function home_options_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-10', 'Available options section');

		$Section->add_group(
			'options-section',
			false,
			array(
				array(
					'name'        => 'options__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'options__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$Section->add_group(
			'options_list',
			true,
			array(
				array(
					'name'        => 'options__list_icon',
					'label'       => 'Options icon',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'options__list_title',
					'label'       => 'Options title',
					'type'        => 'text',
				),
				array(
					'name'        => 'options__list_text',
					'label'       => 'Options text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'options__list_items',
					'label'       => 'Options list',
					'type'        => 'wysiwyg',
					'notes'		  => 'Use list'
				),
				array(
					'name'        => 'options__btn',
					'label'       => 'Options button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'options__btn_link',
					'label'       => 'Options button link',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_options_section_fields', 10, 5);

function home_review_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-11', 'Reviews section');

		$Section->add_group(
			'review-section',
			false,
			array(
				array(
					'name'        => 'review__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'review__list',
					'label'       => 'Reviews',
					'post-type'   => array('reviews'),
					'limit'       => 10,
				),
			)
		);


		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_review_section_fields', 11, 5);

function home_blog_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-12', 'Blog section');

		$Section->add_group(
			'blog-section',
			false,
			array(
				array(
					'name'        => 'blog__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'blog__list',
					'label'       => 'Posts',
					'post-type'   => array('post'),
					'limit'       => 3,
				),
				array(
					'name'        => 'blog__btn',
					'label'       => 'Section button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'blog__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
			)
		);


		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_blog_section_fields', 12, 5);

function home_faq_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id) {

		$Section = SCF::add_setting('home-13', 'FAQ section');

		$Section->add_group(
			'faq-section',
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
					'name'        => 'faq__name',
					'label'       => 'FAQ title',
					'type'        => 'text',
				),
				array(
					'name'        => 'faq__text',
					'label'       => 'FAQ text',
					'type'        => 'wysiwyg',
				),
			)
		);


		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_faq_section_fields', 13, 5);
