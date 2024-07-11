<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u882619208_BeB2R' );

/** Database username */
define( 'DB_USER', 'u882619208_y4N3w' );

/** Database password */
define( 'DB_PASSWORD', 'vxvmQqhIVv' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '/1t^qzOJ?1kdQCmjiJ1$|% `c(o.@@lQ4F:zqr%@se8Eggc;u<|>SL5R+}(YrXX@' );
define( 'SECURE_AUTH_KEY',   '@<wH2,}A;r/k8KYjTor8ZA0kjGd]M;6<>3ESZxV^ZM*,O8.]%r;,h]!pG|PU_tTb' );
define( 'LOGGED_IN_KEY',     '!o0f$y0>}baVTMjfBDWjw{3((Z:afYm2>w,&Qj,].fe_/;f:/j?]}2t340`B=:3K' );
define( 'NONCE_KEY',         '.J^KcY7DC4$iNsIHR-6(pHY)OCkeyW[Z[k$2{sBNaj7ewU}%m*EHuJ1,+`LR}G&x' );
define( 'AUTH_SALT',         '4enmKEL$=3a*=Jo~Pqq-~YmmJWLrYVntySHiA%ANz2{%eirFCJ`=cy94FzEd>a:x' );
define( 'SECURE_AUTH_SALT',  'K)/p,?m;>[dY47I1t;e4U q2ZuRrLYKAsG_zM[NS/ibG;9k|K:[/U,X@Q/MyA8_S' );
define( 'LOGGED_IN_SALT',    'C_:F.Rxr?8?2#?.:rg<bsxZK,kVZ.jHC _1Y^wqvueR*R$6|& HLZ!%.fiT2CI?}' );
define( 'NONCE_SALT',        '.Ywjel>h$5mBcgekR GrNykTTbj,Zj4:(4L/89|`H_WNZM1Zp04O Uj^_u]# V~<' );
define( 'WP_CACHE_KEY_SALT', 'Ws/R[@.RQa*VwFssCM!J$nE+*TdcH4Znwy;IVM[C<zKyS%9*ji%>;mni<qH1s,51' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
