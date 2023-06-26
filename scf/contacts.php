<?php
if (!defined('CONTACT_TYPE_NAME')) {
	define('CONTACT_TYPE_NAME', 'our-contacts');
}

function contacts_part_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type == CONTACT_TYPE_NAME) {

		$Section = SCF::add_setting('contacts_part', 'Edit your contact');

		$Section->add_group(
			'contacts_part_field',
			false,
			array(
				array(
					'name'        => 'contacts__addres',
					'label'       => 'Company address',
					'type'        => 'textarea',
				),
				array(
					'name'        => 'contacts__tel',
					'label'       => 'Company phone',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email',
					'label'       => 'Company email',
					'type'        => 'text',
					'notes'       => ''
				),
			)
		);

		$Section->add_group(
			'contacts_office_field',
			true,
			array(
				array(
					'name'        => 'contacts__office_addres',
					'label'       => 'Office address',
					'type'        => 'textarea',
				),
				// array(
				// 	'name'        => 'contacts__office_tel',
				// 	'label'       => 'Office phone',
				// 	'type'        => 'text',
				// 	'notes'       => ''
				// ),
				array(
					'name'        => 'contacts__office_email',
					'label'       => 'Office email',
					'type'        => 'text',
					'notes'       => ''
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'contacts_part_fields', 10, 5);
