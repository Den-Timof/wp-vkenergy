<?php
	/*
	 * Настройки темы
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	Container::make( 'theme_options', 'Settings theme' )
	->set_icon( 'dashicons-admin-generic' )
	->add_tab( 'Основные', array(

		Field::make( 'image', 'site_logotype', 'Логотип сайта' )
			->set_value_type( 'url' ),
		Field::make( 'image', 'site_logotype_2', 'Второй логотип для анимации' )
			->set_value_type( 'url' ),

		Field::make( 'text', 'site_phone_1', 'Номер телефона (1)' )
			->set_help_text( 'Отображается в шапке' ),
		Field::make( 'text', 'site_phone_2', 'Номер телефона (2)' ),
		Field::make( 'text', 'site_phone_3', 'Номер телефона (3)' ),
		Field::make( 'text', 'site_city', 'Город' ),
		Field::make( 'text', 'site_address', 'Адресс' ),
		Field::make( 'text', 'site_index', 'Почтовый индекс' ),
		Field::make( 'text', 'site_email', 'E-mail' ),

		Field::make( 'text', 'sertificates_btnmore_limit', 'Страница "Сертификаты". Количество отображаемых сертификатов' )
		->set_width(50),
		Field::make( 'text', 'sertificates_btnmore_count', 'Страница "Сертификаты". Количество загружаемых сертификатов' )
		->set_width(50),
		Field::make( 'text', 'reviews_btnmore_limit', 'Страница "Отзывы". Количество отображаемых отзывов' )
		->set_width(50),
		Field::make( 'text', 'reviews_btnmore_count', 'Страница "Отзывы". Количество загружаемых отзывов' )
		->set_width(50),

		Field::make( 'text', 'service-footer-form-text-1', 'Услуга. Форма. Текст 1' ),
		Field::make( 'text', 'service-footer-form-text-2', 'Услуга. Форма. Текст 2' ),

		Field::make( 'text', 'format-download-files', 'Список форматов скачиваемых файлов' )
			->set_help_text( '(!) Строгое форматирование. Обязательно перечислять расширения файлов, например ".pdf", через запятую и без точки в конце строки' ),

		Field::make( 'text', 'archive-product-count', 'Архивная страница товаров. Количество отображаемых товаров' ),

	) )
	->add_tab( 'Подвал', array(
		Field::make( 'text', 'mc_footer_copy', 'Копирайт сайта' )
			->set_default_value('«Создание сайта – Интернет-мастерская «Сайтформ»'),
		Field::make( 'text', 'mc_footer_policy', 'Политика конфиденциальности' )
			->set_default_value('Политика обработки персональных данных'),
		
		Field::make('radio', 'mc_footer_footer-list-1_show', 'Показывать первый список')
			->add_options(array(
				'on' => 'Включить',
				'off' => 'Выключить',
			))
			->set_width(25),

		Field::make('radio', 'mc_footer_footer-list-2_show', 'Показать второй список')
			->add_options(array(
				'on' => 'Включить',
				'off' => 'Выключить',
			))
			->set_width(25),
		Field::make('radio', 'mc_footer_footer-list-3_show', 'Показать третий список')
			->add_options(array(
				'on' => 'Включить',
				'off' => 'Выключить',
			))
			->set_width(25),
		Field::make('radio', 'mc_footer_footer-list-4_show', 'Показать четвёртый список')
			->add_options(array(
				'on' => 'Включить',
				'off' => 'Выключить',
			))
			->set_width(25),
		Field::make( 'image', 'mc_social_vk_img', 'Вконтакте: изображение' )
			->set_value_type( 'url' )
			->set_width(25),
		Field::make( 'text', 'mc_social_vk_url', 'Вконтакте: ссылка' )
			->set_default_value('https://vk.com/')
			->set_width(75),
		Field::make( 'image', 'mc_social_facebook_img', 'Facebook: изображение' )
			->set_value_type( 'url' )
			->set_width(25),
		Field::make( 'text', 'mc_social_facebook_url', 'Facebook: ссылка' )
			->set_default_value('https://ru-ru.facebook.com/')
			->set_width(75),
		Field::make( 'image', 'mc_social_google_plus_img', 'Google+: изображение' )
			->set_value_type( 'url' )
			->set_width(25),
		Field::make( 'text', 'mc_social_google_plus_url', 'Google+: ссылка' )
			->set_default_value('https://plus.google.com/discover')
			->set_width(75),
		Field::make( 'image', 'mc_social_instagram_img', 'Instagram: изображение' )
			->set_value_type( 'url' )
			->set_width(25),
		Field::make( 'text', 'mc_social_instagram_url', 'Instagram: ссылка' )
			->set_default_value('https://www.instagram.com/?hl=ru')
			->set_width(75),
		Field::make( 'image', 'mc_social_twitter_img', 'Twitter: изображение' )
			->set_value_type( 'url' )
			->set_width(25),
		Field::make( 'text', 'mc_social_twitter_url', 'Twitter: ссылка' )
			->set_default_value('https://twitter.com/?lang=ru')
			->set_width(75),
	) )
	->add_tab( 'Главная страница', array(
		Field::make( 'text', 'magiccard_about_service_title', 'О сервисе - Заголовок' ),
		Field::make( 'textarea', 'magiccard_about_service_text', 'О сервисе - Текст' ),
	) )
	->add_tab( 'Copyright', array(
		Field::make( 'text', 'copyright_company', 'Заголовок компании' ),
		Field::make( 'textarea', 'copyright_studio', 'Заголовок автора сайта' ),
	) );