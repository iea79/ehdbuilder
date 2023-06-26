<?php
function reviews_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'reviews' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('review-1', 'Review user data');

		$Section->add_group(
			'review-user',
			false,
			array(
				array(
					'type'        => 'datepicker',
					'name'        => 'review__date',
					'label'       => 'Review date',
					'date_format' => 'dd/mm/yy',
				),
				array(
					'name'        => 'review__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'type'            => 'radio',
					'name'            => 'review__stars',
					'label'           => 'Star rating',
					'choices'         => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'check_direction' => 'horizontal',
				),
				array(
					'name'        => 'review__text',
					'label'       => 'Review text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'review__video_file',
					'label'       => 'Video review file',
					'type'        => 'file',
				),
				array(
					'name'        => 'review__video_prev',
					'label'       => 'Video review thumbnails',
					'type'        => 'image',
					'size'        => 'medium',
					// 'notes'       => 'Can be used instead of a featured image without video'
				),
			)
		);


		$Section->add_group(
			'review_slider',
			true,
			array(
				array(
					'name'        => 'review__slide',
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
add_filter('smart-cf-register-fields', 'reviews_fields', 10, 5);
