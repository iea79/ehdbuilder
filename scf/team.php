<?php
// Регистрация метабоксов и произвольных полей.
function team_member_fields($settings, $type, $id, $meta_type, $types)
{
	// Отображаем поля только на странице редактирования Записи
	// var_dump($type);
	// echo get_page_template_slug( $id );
	if ($type === 'teams') {

		// Создаем блок настроек (метабокс).
		$Section = SCF::add_setting('team-1', 'Info');

		// Добавляем в метабокс произвольные поля.
		$Section->add_group(
			// ID группы полей.
			'team',
			// Повторяемая группа полей? Да - true, Нет - false.
			false,
			// Массив полей.
			array(
				array(
					'name'        => 'team__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'team__descr',
					'label'       => 'Description',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'team__bio',
					'label'       => 'Link in bio',
					'type'        => 'text',
				),
			)
		);

		// Добавляем информацию о наших полях в общий массив.
		$settings[] = $Section;
	}

	// var_dump($Section);
	// var_dump($settings);
	// Обязательно возвращаем данные.
	return $settings;
}
add_filter('smart-cf-register-fields', 'team_member_fields', 1, 5);
