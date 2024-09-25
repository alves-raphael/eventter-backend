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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress123' );

/** Database hostname */
define( 'DB_HOST', 'database-practice' );

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
define( 'AUTH_KEY',         'bRVXa<t[du5SQ&3,H/%1s7uxU.gM#+^QR[Kd~=M?%[=g_o//5ATQ8@=EYW4vHB8G' );
define( 'SECURE_AUTH_KEY',  '.s+?uf@WA`[%[/WI;#mcSqEq{wqIVbNm;X.TWu,3?y,4DBG:$aA9BF,f%X=w1e$V' );
define( 'LOGGED_IN_KEY',    '%[Vs=YJzWWh>vqqHWj*7Hto=3AD`Z6ztHg$JjrIY-T )$!Tt=4#_Wh0<mJCm(d8 ' );
define( 'NONCE_KEY',        'vIps@g/a5o!>^ibL,<1)Psa?.K )!R7G]cF{6#24 YhK8*XHEY@-=~ ?|$H+wE}9' );
define( 'AUTH_SALT',        'ok]&#D0,rVGK7!54WGQ=oNw_];YY@+~!udA.S@~l^|X`#R/*GXqe6>wm8^C&A= I' );
define( 'SECURE_AUTH_SALT', '/UAe2>wn h4I@;CW*oQh[h,`u1X|WqqU}79|tc]~=GFL!rELspq9Ibay<<kt*I-`' );
define( 'LOGGED_IN_SALT',   'Nc,9yJb58oi$/&DxBD9$)*(GTQqj2KqV![zOU8.4hlt:Uf|]mYUBw^o1mLOr]}yj' );
define( 'NONCE_SALT',       'eqf,2BGo5|jH}1G.Urf96gm@;/>cKjnhn*Vfq[&Y^Ssni7kM:Cv0U`n+Ya RDC8D' );

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
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD', 'direct');
