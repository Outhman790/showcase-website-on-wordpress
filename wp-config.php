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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'A%D2Aj.q(>|#9kK3n(P9(dTN%cfwU(A{5wKE61=|K*IKsS`#8C&9Y$EuX#,e:/Fk' );
define( 'SECURE_AUTH_KEY',  '),w{_jbL;n.4B^+i.gN;Km:v,C5&>C-mu91~m]&)|<@l^L>Pi B#2c4/7t&nF2Y(' );
define( 'LOGGED_IN_KEY',    ';=p9gYa.oTO4Yf4A*uSmhe$~l(1+/|5U&M5w!(7v_iH]8@uMXOA1DKU@&Ep9P$:x' );
define( 'NONCE_KEY',        'Ek0f&OwGKy6sORYrnkKsi-<(n9b!ZA_~)2>uebu/EKBTQW9NDKfh-+5>`[MW>TDv' );
define( 'AUTH_SALT',        'ngZqu~w|++J*p$%S>xL%U+&e^UtrQbx+Ga~):<C29yn(P j/$$(,bcy;;lNN+5N1' );
define( 'SECURE_AUTH_SALT', 'yhVN9.=0{~zRL-?[mX C^KszhW!{h{UA`H76t6oQgtYhoepF!ktnn!%lvWM.escB' );
define( 'LOGGED_IN_SALT',   'h=%bp<h]#GCvhBuZQRp6]eqTUW8  <CTR(Q^6nhSw,+^sb~c`O>)w~]u/n|yn5yk' );
define( 'NONCE_SALT',       'KnC|UE0V`BpH@rAD[,Ibs$&|(gv^KM2Qv0#2!a.Af07]$LqN#=c|8,,i.zXf%7A,' );

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
