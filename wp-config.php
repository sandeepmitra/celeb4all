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
define('WP_HOME','http://celeb4all.inforain.in');
define('WP_SITEURL','http://celeb4all.inforain.in');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'celeb4all_db');

/** MySQL database username */
define('DB_USER', 'celeuser');

/** MySQL database password */
define('DB_PASSWORD', 'celecs#123trr');

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
define('AUTH_KEY',         'FAHqF=jwD$W}R s>Y7XTihi%q/ZAje Z;|Q~[rX+iE[b?|du&9HD*n!v  {:1Zfz');
define('SECURE_AUTH_KEY',  '}8Vh#S&Tv}C<+F+5 dI]LWiXC[zy#OYJCZ`CdD-O#zaaGZp28vx3CUeGJUxS9;p[');
define('LOGGED_IN_KEY',    'G#s8p,li!W7Bi;x7P,bZ|:8ODS2LVjqyvE -=p!!)@h:O+SIH@p@zW~wGC1%;2N.');
define('NONCE_KEY',        'InE^j!dcg@`g?f8_5r ~:%##!~c9Br.s&0]0p:!W+zvak>>uCT==)%68zh>g[C{m');
define('AUTH_SALT',        '-|k4e@uRaPip6hKja[DiX>5{?{F9zg|~.}o!F+dehI~d&2!4Lg2@glUA2dNZ{@D%');
define('SECURE_AUTH_SALT', 'i7ILDEJENe~AGTjqw_|b> ,`u8MH5$czsVW+N O=f2z4Kj*Vzwhim@Cc^N-_T0PH');
define('LOGGED_IN_SALT',   'GV@)D!RR]SukX{gs;IugUn]>^3N?<8UV^R1AR&5>e+j6tx;Tb{@dn3JX/X,22#a$');
define('NONCE_SALT',       'WOeQ(Ry<^;Y~dakH%Lk[l9quVzq0l O>N3.c(tJ_p/O_)[p~SO#Z@}|$2+5qQoqe');

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
