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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'firstwordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'D%Mdx 4}v,lf]2AZD&BTyv==iXuHJ#Ge#<v75(02LdY/P,O1*-7${q^`6Y;dK234' );
define( 'SECURE_AUTH_KEY',  'c-iZ2i(u?Dq]S|B7$P@QkzR&);e1[6>.AF$a^BYO~aa-%a{PcUdrdlQPL_^>SQjh' );
define( 'LOGGED_IN_KEY',    '$8&%ff}MW-q7:eH6eI#Qu` .(a^szMBMhCm]65wEMs.HwX;Ip-K[1_^UD|+d;=*H' );
define( 'NONCE_KEY',        'tyn~-~Tm4?QFP}=YABY,8FvK-xhCB>?,H9,,HoH4]7EUQLNe1$)#<ObEof6L`v5@' );
define( 'AUTH_SALT',        'oMuq2[Doi&2|ho@B5MkET%/R;y%=ZE:lNi[B5*7hV/njb<}KYlZa-I$HGyfG4#^K' );
define( 'SECURE_AUTH_SALT', '[s{JKZ`z&W5|XObpE) WYrTK>,_/C-=TDdoH#,MtAl20CM_Up;WP>w 2K4Eo~JbW' );
define( 'LOGGED_IN_SALT',   'ui~WZyY&WIUhEw:qr$X6}h$Z@5xq1Sn!VDz5~Wz`8:J $&L8`!ss!G8{qp(qr[oe' );
define( 'NONCE_SALT',       '/5+:~<vOMR6+3$CjP0yIJ}:[T5e!(!<Fm(O$K.J&13UABx%bg|pzj^!}lV1EC@2a' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
