<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'getg' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't&97(=qcHk}e$UH}W*i-)ORjs,QhYo81@=QF^ygaFt}E>F(KK MgW[jH-K.-pZ;|' );
define( 'SECURE_AUTH_KEY',  ']bZ+CPv@Y%5Z{7QO_^usd2vHyT(sn?!DyJ79wj?Z^MAnJ>;[a[p9EKVe!|NuQpt+' );
define( 'LOGGED_IN_KEY',    '; .sxrR,rqPd7{d2=AXtdf@^q`$VC3>^uDmKOYD@q{0AEl6qhwc`)<4$Rv6}p~?+' );
define( 'NONCE_KEY',        'N S]-JA#Fd+%1oumeTmnkRON|A-^,p?S!N%fdHL(q{:{#$ilG_cM;HOGeC0gK2Rp' );
define( 'AUTH_SALT',        '}mutgeHIJ(,Z,BCt4R&3n=.$}kMz As4@FY=@r|npk+MytBSo%@ +Q<F-Rds J^M' );
define( 'SECURE_AUTH_SALT', 'H#4vG|q24~L/9kaNg9Pe<FXVQbe5W^[4S|K$, *LJpCZ&fN8$6g1PLR|&A40oP8z' );
define( 'LOGGED_IN_SALT',   'kQt)%dWx[hEdA8&vP1sb!{24pn]D5~nvlnA-u2FkY|CO1h<n42vWa<fu>f~5}tv}' );
define( 'NONCE_SALT',       'ACLIvVR]3HukSch:y/Yc]((ArTnDtO8 HiDHaYue,-E<q(%Tay)Y%J8G0QRB4;P/' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'getg_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
