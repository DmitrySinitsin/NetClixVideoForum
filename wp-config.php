<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'cl89782_net' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'cl89782_net' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 's3WzHx25' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p91KuWp/2AwES[p[wF_cSS@:[]/mx1g(Z4{x+aMmI?kF3*nD?BoI3Tx4>l4bG$Q!' );
define( 'SECURE_AUTH_KEY',  'J%hyHt2;ieO:~zROXn/L. wxSwaV;{|+ ]}An_r~nD!tesdWWIk1Pdpk[6b/&tPO' );
define( 'LOGGED_IN_KEY',    '=ukM4/nY:32?(rY%|F8:B?$1!<?$/u>(uNSE8/@^XsQijdg{+4m3iMJ]>o[KHQE/' );
define( 'NONCE_KEY',        ',P3b}t|pC[>`k0kg!3#kR3YDTMh.zIbB>d+B}O=f+jC4)>{)?XrnP5W-~WS*c_ef' );
define( 'AUTH_SALT',        'VQHP=<,u/;)@65;mQX[I|YNf=*i2QVpms-JVO5.h>5c&:~Ld^M5Fed>O#Buz$}S)' );
define( 'SECURE_AUTH_SALT', ':,O^Au D&R=$JjAM/meYm8UcR272cLqzr$?`X0[;l@F6wC-H+F`Uq.g<[QjoF4o?' );
define( 'LOGGED_IN_SALT',   'xMGrsp~C@`O!pW{nNvUsl1cny{]{T$78b4&~WGS=wP~5>F6cs9X_o>pt8KJ%zQix' );
define( 'NONCE_SALT',       '*33j>^@01^k&`s;A`Pk)$`C,#mYp]#1_8;a456bu :<zJBQ#AEdpBSl2LSu)!svi' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
