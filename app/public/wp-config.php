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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Mr5QZu4PFms0hwXrfZ2dkNkh8DB74lzW+OVClskgtr72t/A2DZ8uzMJsOMyBfOeHdWrLtzUrWetteruiDkzsYw==');
define('SECURE_AUTH_KEY',  'LvKmDZPflZX0P/fnHGGuWCW+7wjEQP7znrJTxyC4z6opwgr6OTaT36QcQeEY6PcM5ebTaewm6RtFHud7TswZQw==');
define('LOGGED_IN_KEY',    '3MLbK4yK5IEBSKHqrACeftyBACsL6Vyav5L08P6z5MLB7U6awXZQGfe+EKHsujUD+EGAXcbR7KeJfZAZ7nj/dA==');
define('NONCE_KEY',        'lxtPxmdA2e0ZomkZ/qiqambmZ+M3kseLs9OZcKP5x5AyJfgDgOVxKMEO1ZiQ+9aMyDvN4gkztUo17FeO3Nmq1A==');
define('AUTH_SALT',        'ziaSoaRBxolIm9qbWG4xWHFhRpCRsJHHhbQ6lh713ba8oV+Z+wP0hdZR5/4t1dm9T3aevFYWKef7fiDHJIKPbw==');
define('SECURE_AUTH_SALT', 'au+RPDO6XeEEjk1LGYdx/LU72UK1cMpHlLKUDx6f2HnMEWv2c/PDxxqGGigME3mEs+rU9GO82GZe4KrvWaNtbQ==');
define('LOGGED_IN_SALT',   'L5KZDY722GbLuU3WfX0lvIhZXRBJTAfZZxtam1uHlrYIm6+wJYF/DDv9QO4mlZdRip125B22ouh1oZVSwnxmEg==');
define('NONCE_SALT',       'qeaP2OksiiB1VXytI9Vth2mC1z7vKb6VlV9LUn2KDC9LfoR8R37lK5qy1SzjZUodl8MzjefsvhQ2w8XR18KtnQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
