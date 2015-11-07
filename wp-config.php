<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mosaweb_dev15');

/** MySQL database username */
define('DB_USER', 'mosaweb_dev15');

/** MySQL database password */
define('DB_PASSWORD', 'hibernate1');

/** MySQL hostname */
define('DB_HOST', '192.254.234.193');

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
define('AUTH_KEY',         't-RL@exq1|-cUY%pRgA2(u^6NqN3yL.-QkD_C=*30p.0P.vPDU-)uEuKFVAkxA]N');
define('SECURE_AUTH_KEY',  '{ s-AS|&Ped31+jv(g|o*g@rU=V-iv/Mg>p#T..6vm_szhZI~m)x^`*68qwi;OY?');
define('LOGGED_IN_KEY',    'I?%,,[[ZDS>&!I/aA(Ny_V!LkNF)k>M(7U+F/Mpu-3`/{0YyM`/]QZ-0vRAU_!|-');
define('NONCE_KEY',        'f}[wz*i4.beiLL#)`Y/[t<i69QGvY16vx|A=M{+;gj - Q1 ^4%ZMd6Nz3P:l=d:');
define('AUTH_SALT',        '.-G;4iCn;3|-/n^-NCMa+Z#E,LMU?X@Iq]7@Ga99r|nIia52S]2pp.,PTsS&Nt2C');
define('SECURE_AUTH_SALT', ';RGB4^v2@%*(o*UKp+VfUJ2<|&OyOqy*$&DNb/`*=N5zIn#br4opv(2b@I1FaT]o');
define('LOGGED_IN_SALT',   '(,H<|e!XcP{b5&c7KLL5R16|@C}PB*S(ATJ-_+:)01_COC:euBx1xW4%HzU#>U^u');
define('NONCE_SALT',       '51?!mSwsE2$54C6].Nu2dj/q}PGeiGS2Ases9_.W&y7hpXit|3hkhDIb*o]Qn~f=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_ENV', 'development');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
