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
define( 'DB_NAME', 'qa' );

/** Database username */
define( 'DB_USER', 'root' );

define('FS_METHOD', 'direct');


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
define( 'AUTH_KEY',         'jxG|j6@*}(^2r(Ua>&Kn`:oW6MqL6<c5phuZzE,;IvU5huN|0.nm#eO2v&(cK^Dd' );
define( 'SECURE_AUTH_KEY',  'aS(4r8J@WJ/ c4<+#O[8czChj{K+3L=0?muxm#{7V&jhg3x+<N?!^VfT,e|ZUcYd' );
define( 'LOGGED_IN_KEY',    'bh9(4SA!>#;GirzZ/8J[jgpO=aH%8/k`d)kqfLIriEa(|GTke!HHo!LjqTDXphy/' );
define( 'NONCE_KEY',        'n<33d[{ol#B1M>*9k}OYZhmnT!{bJQHk<?UwtB`6):jeJb7H.l~ a50M[W!z04Tc' );
define( 'AUTH_SALT',        '3w>dNbn?]hcn{fR.{&`:,:B,,pIvT~@|:BsM-HBRllv!eSnhGPmO[OBHW({sS-e}' );
define( 'SECURE_AUTH_SALT', '0q|+[3?.n,VZj}%s-&-{IS.LHd%(v?D/8vZW}vUP+5J<3PB(Es=K94cQ~O-@S.?d' );
define( 'LOGGED_IN_SALT',   '@ly[_mVL`e(4in0`s$^1+n]%Y)}FB)rr)ESQF]Xw(fa55W|8Acxr#b}>tb]9p:@-' );
define( 'NONCE_SALT',       'C#k7 +QWEB<C1=*Xm:5WMYFSA]T.1fZ/Zj82PXV-vxBX*RISUDvNZHqRf0bw=dMW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
