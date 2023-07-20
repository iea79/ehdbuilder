<?php
if (!defined('ABOUT_PAGE')) {
	$current_page = get_page_by_path('about');
	define('ABOUT_PAGE', $current_page->ID);
}

function page_about_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (ABOUT_PAGE == $id) {

		$Section = SCF::add_setting('about-1', 'First section');

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
					'name'        => 'first__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'first__video',
					'label'       => 'Section video',
					'type'        => 'file',
				),
				array(
					'name'        => 'first__poster',
					'label'       => 'Section video poster',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'first__img',
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
add_filter('smart-cf-register-fields', 'page_about_first_section_fields', 1, 5);

function page_about_team_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (ABOUT_PAGE == $id) {

		$Section = SCF::add_setting('about-2', 'Team section');

		$Section->add_group(
			'team-section',
			false,
			array(
				array(
					'name'        => 'team__sub',
					'label'       => 'Section top title',
					'type'        => 'text',
				),
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
					'type'        => 'relation',
					'name'        => 'team__ids',
					'label'       => 'Team users',
					'post-type'   => array('teams'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_about_team_section_fields', 2, 5);

function page_about_approach_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (ABOUT_PAGE == $id) {

		$Section = SCF::add_setting('about-3', 'Approach section');

		$Section->add_group(
			'approach-section',
			false,
			array(
				array(
					'name'        => 'approach__sub',
					'label'       => 'Section top title',
					'type'        => 'text',
				),
				array(
					'name'        => 'approach__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'approach__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$Section->add_group(
			'approach_list',
			true,
			array(
				array(
					'name'        => 'approach__list_name',
					'label'       => 'Item name',
					'type'        => 'text',
				),
				array(
					'name'        => 'approach__list_text',
					'label'       => 'Item text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_about_approach_section_fields', 3, 5);

function page_about_review_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (ABOUT_PAGE == $id) {

		$Section = SCF::add_setting('about-4', 'Testimonials section');

		$Section->add_group(
			'review-section',
			false,
			array(
				array(
					'name'        => 'review__sub',
					'label'       => 'Section top title',
					'type'        => 'text',
				),
				array(
					'name'        => 'review__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'review__ids',
					'label'       => 'Testimonials',
					'post-type'   => array('reviews'),
					'limit'       => 10,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_about_review_section_fields', 4, 5);

function page_about_exterior_section_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	// echo $id;
	if (ABOUT_PAGE == $id) {

		$Section = SCF::add_setting('about-5', 'Experience section');

		$Section->add_group(
			'exterior-section',
			false,
			array(
				array(
					'name'        => 'exterior__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'exterior__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'exterior__img',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'exterior__btn',
					'label'       => 'Section button',
					'type'        => 'text',
				),
				array(
					'name'        => 'exterior__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'page_about_exterior_section_fields', 5, 5);
