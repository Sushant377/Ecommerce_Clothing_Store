<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'naya_luga' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '2M!&}]+]Q%6LC0pk&#T4k+T]fFt.-S;,xB#MuPPt=Z&8 T}Ok;ylfweH=r*u@mFg' );
define( 'SECURE_AUTH_KEY',  'ws1rN_cS8>?C_jDpzj/H<^|^XN,uD0>`Fi^tiHIQOIYqe6j>XbF^zj1R)/#`iBSF' );
define( 'LOGGED_IN_KEY',    'CgyeQvJrJYq(9IuI3Vi_Lhq4cw6m7H6C^hb^K!*538-1PCivJU4u(5,`D*nk:DfX' );
define( 'NONCE_KEY',        'VPC/@BGm0D^S2(%W+ Cq8KP+89_$FKD/LiHbKmY2:&H#ZT{d:fPSi>M9<Oj8g+EH' );
define( 'AUTH_SALT',        'bjW1V[:54Wdh~yX<P;rcOCg<L~rLqT.btyMX_T!=5umZR^>2z[%1<+)KNLU8oXD:' );
define( 'SECURE_AUTH_SALT', 'g!2$!A&]5RT@U[xi#%GH.yCfW0p}>iGLHN9XwEN%)<wF9:Jfr@T&}07M@+]xORs^' );
define( 'LOGGED_IN_SALT',   ',NvB=si5J7?tySGY3Uu@Z5x%tIR0H*2~HkQ,}sxPE@ go`|ukb~.PwO-8p4F}y{6' );
define( 'NONCE_SALT',       'dsl%%j)ztjKDeZA)TrL}aD30`UIP)=yGa2[6L_qhu~}:&4Q_[Y)RN!Irr&ha?6wz' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
