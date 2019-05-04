<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'db_scgc' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '/^0w`JELdD*)zqWEl-Rj34TtA&_>5>lwn;9grTwr09,-GlZg0(Q=&zYfZN{Lig*}' );
define( 'SECURE_AUTH_KEY', 'g%$)*sk4cUKTHw,#|{M~U mP88TtG8e_@k?MlC.Q[=^v:#:K& )YUz0i,),0/z(a' );
define( 'LOGGED_IN_KEY', 'Ig!S)z]J=60|HS;;7Z33*`9LD-9vS/6[@]-,XlzKGD%m_%0[+-1$#A9u!p =C1q&' );
define( 'NONCE_KEY', 'ZEvL$STkgQxA`d_WuPhOnXCI6yHk+c^[5fav3B}n74#+Z.F8x>[$@2FA3_1J<6;u' );
define( 'AUTH_SALT', '6!X?h/glUijrSd,le-;f}tAjo1WcleZ0J:N L}F!zuB(L7&i$i}m2 )g5mH.O(&}' );
define( 'SECURE_AUTH_SALT', '7[0rx#4h]JV`Zb8$(.?$f+qaVq sk(i *KMGb`[u[7H~fTk8<#-#;h(%$@ Bw1{)' );
define( 'LOGGED_IN_SALT', 'Q]C2L`kYlKA!rz]jrlZ0[GgdW{8R]^$|?q?*DfT2I-+qq[?LcdX6/#>&B}{`6]2y' );
define( 'NONCE_SALT', 'ATYkD#,[N),5DgrDFJ(amb:n@T>NgU:?G9h~vH!{^wd;HNJYh5^FdO$/{QP@9k1=' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

