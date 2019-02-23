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
define('DB_NAME', 'shopwp');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SKd-E)Di[Ky0 D}p(G5{`WJ/0=B1]Q3SVf@U8`IF0ve;8@znNdkdOcY:JU;|^_;/');
define('SECURE_AUTH_KEY',  'mT>l2K6-ts1d83W]bD^j6wVk-.0$/zD,Pa<6_6KipvHz@!0[q54G)Qq#&|#/Ze6t');
define('LOGGED_IN_KEY',    'vZ?FT%U*Sr]Xw+^gM+BikVc),X7ExEABZZLkBy-}KW/Yg?q-M,cuz[=E^Rb>rAq!');
define('NONCE_KEY',        '|%2lW:DE8bL19X,Qp/`M4)dA$ {bSe(r(A-F)ck(0;@j9h/MM$l[E EGCX1(+Y/ ');
define('AUTH_SALT',        '0/T*3$d oWfFTmHie;SNr]81F+GH)fS|t9Uw^K$4};NAoM;1$+h/qr`1OH2$ZyUE');
define('SECURE_AUTH_SALT', 'p*KV4n@:^~>Me^w#+bH6*.ic[H<]W)sx&}!{u?DEy?@p;{_m!u67G|$^OxvUjs!/');
define('LOGGED_IN_SALT',   'zPX_HXT,*#d7QH(#.V{_j6Grm:J!iz_:k.HsTnr&{Kw0;-l~{Do sk9?dF@3ch`9');
define('NONCE_SALT',       'M-sHWxr43?`m2IeMRWSY5FU1NN+O7T??ENQe|9fj%y2qB5*t[K$r`?7GXiVMUZa9');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
