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
define('DB_NAME', 'wordpress_filminfo');

/** MySQL database username */
define('DB_USER', 'username');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         'BLd_,.~x#aCS#yXvW9O-B&h:>xc/`^!%k-b@&X>6.Cmb5w?zCv]t&QL.Sovya}$t');
define('SECURE_AUTH_KEY',  'fudFRO4+A.{b<l%Ww.tyBxl[CAQT+@EZEv`Qfe~Ty:;Dx3~W84!2QkYfnB-.1pNd');
define('LOGGED_IN_KEY',    ')xHa9B/2Zl4qo$_E161O6F5dP_Fjij@h&LOFRl68(yd}zgA.sItiMmnyPs@Gt]d^');
define('NONCE_KEY',        '?eLAKc 0_7$yn0U3PE>7q&6I~N9M`F!QF,{ml[.=e-C+ HLu*EZ_##&Zh@aW&1Kl');
define('AUTH_SALT',        'S$AT>|#*G9]x.@fmFj[`) S`EiSue5jExo-HNZrpNbHXa2r=VNA`:AH8a<J:._5A');
define('SECURE_AUTH_SALT', ',5jBm!z{fmON>4h3q@^BE<g3_Zt$6Q2{A9CI7;~^n_u`ese2OnfNcJ/K]>xRd[0F');
define('LOGGED_IN_SALT',   'Pp:7jzwNjiCRQ6tfhve%(su@cSQC2_pc|y{h85]D4J-9GGRb3,}(z$1{Z_aRm=e7');
define('NONCE_SALT',       'BG/^pDLBWnx&A:aHujS)13@zh5B|>EMMf;,r0sp!F[intF@Heetp=?]kq%K$E[,S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'flminf_';

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
