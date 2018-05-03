<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'piano-teacher');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'U!s(swg]%$l5R*n~p;iEXkXnvSbf6wPb+,>GUFu#heKr~RW2(iCT wG(sr;.@OOQ');
define('SECURE_AUTH_KEY',  'HH+|$u]pyKBmaQ:;qV:aeRSq=ak1_xjfczzM*-kFk@M?,T2(7+U0Zy(U[CT-iboc');
define('LOGGED_IN_KEY',    '7YB7$IQgQ<bq$tH7qYHs{ im3(38O!tY^eFMUs#{@#A3nF3gfZLMPZt}-THSnbm(');
define('NONCE_KEY',        'DZ2gj _.swY_nr[cVrYhE_@I@Zp}>{w9:YTo||u/ 9nB(l82SNrX|#*&kcGS<lsU');
define('AUTH_SALT',        'H)j_fH$^z|)16R0>XDd,MK*A+&fPrjZkHxp|.CMd+r5i`OjpG76^oT8j:~U81[ni');
define('SECURE_AUTH_SALT', 'B$ M0*9Ke j`b;0?_)dwD~fe*z^Yco^xbMd;@RQifhLEJm*C6%^v4.0zH29sMB3u');
define('LOGGED_IN_SALT',   '**^y,|std27~7e|81lAJQ*_!DvNam`r/$4):3Yv4d+/F+wJ(DQc .eWGIHfz`DS9');
define('NONCE_SALT',       'n}k{R+wFDzc@arE 9 Xa(NSrtQc)$9MU8J~E`(fzJSlaW(9 }j5H/$]5fuZ.AwKz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
