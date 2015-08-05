<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mybaliproperties');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         '07R|+_KgTy2BhS/Z:Mwr#SpuZ?`4HWa36@|o|#f?+oz-_z{5Nar9eTc~-^[yD<)e');
define('SECURE_AUTH_KEY',  '`5x[]:mXC1`~8,6lQqC9{rR6P7W+]%u(-I,^(UjEh^p7v<R{-rU( h@BpNGo>H-8');
define('LOGGED_IN_KEY',    'Hz^wJ<|}VkF)tfc6b7]<M#xZM[-$F|:K@^Nx209[<LwnN2)L+m?B|.Xt3=bN!wE ');
define('NONCE_KEY',        'I2!#40jDw}l|;(6I]ZV4%IC9%xvd0BdFp#NBn`KCLQ/:cWlDy9C/N%Rkgw`-<#)m');
define('AUTH_SALT',        '4BIT|h,g7P[eWR-pOa`J<R`bk]m,O:#ztHcfzA[fdjp|i+mMIu-yoWDC<TLin&mx');
define('SECURE_AUTH_SALT', ':>msVwRgOOf62k^7XpBUL;S=K-r8}@YNV9g<PV~=gbrz(8FT`n3@fb1^C_ Dj6D5');
define('LOGGED_IN_SALT',   ',qM1+K(}{Ry+[-OfE3DFX,j-7vcH8iy+,aI;=yl?Dg5VW}*dL5d]vOWvB7@<>[R2');
define('NONCE_SALT',       '82Aj`Lkk-wCV t8zeuqM=bDLxlEjKF74O7K/?DD4|OZ?5B2?hBgB/?+T-T?2Y_1V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
