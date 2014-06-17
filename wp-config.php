<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'oxford-cartographers');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nxw&Njz6_ upAsQuBHi=~XTUX?xL_u+p/yd-l=+|J~Nd!01lT{t7R>pisMt+qt~Q');
define('SECURE_AUTH_KEY',  '/XsZ4NGsUh{CLAI(2O*3jCRzsC_:U505(Wcl(|* V[^FI{u?KvcgSQ]j51eXH,9w');
define('LOGGED_IN_KEY',    'ULR%)2qqcLV#3ikA48^+xFu ]FuC6@.V7Zbj,0~wN0*Z@XzKdm~kMxRpDRE]f,BY');
define('NONCE_KEY',        'KT>c+omjS]2#GX{GlR:i*<sD)e.,Iew|+n[_jw+:<fJ&R:-HpKneg0YU|yqKgAq;');
define('AUTH_SALT',        'PaXrG(x.I.{q&pH%0CIme+tjv)1t<M~ b/qDQ+aTUFaJ6f&r9F0Cq/[!F!o`J.cZ');
define('SECURE_AUTH_SALT', 'a-Koxz@*%<eKb2FO-}NzXWP*+TM`kB,uFQ=4H.:^OW$Arr9&+*3D]9O(JpDeq7h$');
define('LOGGED_IN_SALT',   'PMfVf+D{H]hy6PF}8u.gawpI?[U^uAj^?9q_G^*Y<e-TLp3 1CgQnSxlj(C>y5JM');
define('NONCE_SALT',       'b-9uB.d]x8J20KeN18Ls|Ytota$9A9|b$Dn?p$G&W$A#?o.c,|Lu]zD@YHo96yYi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ox_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
