<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'HesYrVsF9SdCi K:t)4>/OLzK]()LyM[G+3&D*gUF}l_~VJ!IO:l}tAV2b4><dR9' );
define( 'SECURE_AUTH_KEY',   'cPr;-Zbb09e+naPst]@o4u]JK]|sEcXIaKx&FUeVaUzRup=wV0e1An9QeKAVe9u#' );
define( 'LOGGED_IN_KEY',     'xm#5B#aEq1DxV@2<gK?1S%c:fhb*S]bQb_tCI&&vvG6k+t{Cw6rF-%;vmM#ItXq-' );
define( 'NONCE_KEY',         'Vn>K6MJ,Ql[Axzx%b]-m:wja[I5(?E`Nw<IO;*+%m0p8Ks-oAz]b-r}TMmg3Z|!T' );
define( 'AUTH_SALT',         '*$+-.3~=yxGdHhnKCMf3]_k*4oG+jL(7F6).FP/TJ,jd}ubYDZg@kSc:K~,QH51%' );
define( 'SECURE_AUTH_SALT',  'j034]$Lv* Xfq244wpwKLj{IUSu5w:jVqX[B9N1KM?bW5?I:paTuZiNg&)y0qQ_Y' );
define( 'LOGGED_IN_SALT',    '8*4Cre%y}}F`xa~vXf ^kJA<(/4!KC(Nxf%w#39TQ|unPMk]53H6DAS-tYcDMm}_' );
define( 'NONCE_SALT',        'GZs7>s?j:SYMOZ%B3I`&XhFi?!Bd4Zv(K,k$us)FFDdysY>#imfZICVnRab57A_I' );
define( 'WP_CACHE_KEY_SALT', 'JBiE=]p)(~}s6%t@&_a}qfa@RB07sD2N7vac?[C6JZL:@rtt0[{Zo/foh&<.@#zZ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
