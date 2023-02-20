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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hotel' );

/** Database username */
define( 'DB_USER', 'admin2' );

/** Database password */
define( 'DB_PASSWORD', 'T9cWJ73ZXU3l8yR0aR' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '-.k?kk(=t)ew~z;J]jy>OCWp,#Y]tys0lb<^ *U>MJ6G]T **eq2Puh18ls@}5kH' );
define( 'SECURE_AUTH_KEY',  'K=@DS/}A/K)go#jLVMSX%-Zs5:Uzi=?%`dM4kaixTV`o`OmnIZ}INi|%QuC|W)+4' );
define( 'LOGGED_IN_KEY',    'KQfH|Hu7(,dXd[20NB~0K-O|a@+!D%l|>HBwwTCoxg}_bi^pEg!P&h7A))y<UjL1' );
define( 'NONCE_KEY',        '%SSslQ#^TQO~I[=EDKGT3gvRCUf2u@ hLORN#ddd;`TKNNc9HysX6EOZwwKT7fE~' );
define( 'AUTH_SALT',        'Z=o]dByUyDGuOJ|V+zwT7e>1Bo%g~tQmBfASz](%]DL4<hq:>9QP3T,,aO:>.4J}' );
define( 'SECURE_AUTH_SALT', '/mVs8L0pgw> QrW7hfusxWuuL<6X_8LKXq/1+7!toM-S[U#0}sf`1i?HF=~P#5_a' );
define( 'LOGGED_IN_SALT',   'zBR1v5>!NFxf~aDPmQUA*OU,Lyj38?Vc5acC#j0GTKm7F`aG4M[`n$sRfSor1O|:' );
define( 'NONCE_SALT',       'wo[3n|eG{x@IYI`J!LVYpO/t983i=;j3RtoQnH(=AQSz-d-_|)?+XJ*LdkxV,bu5' );

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

define('WP_HOME','http://143.244.190.26');

define('WP_HOME','hhtp://143.244.190.26');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
