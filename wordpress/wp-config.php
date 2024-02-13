<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'wp_quattro' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4}[9or*:=7-b9n^l;Z2Q]]b8fbkyq RX,%sLq$Of{CAXz,(L/J.*g=+j#a7{033/' );
define( 'SECURE_AUTH_KEY',  'V}zi$-CIh!E8(;6Ufde s^j5)xJ>nw6J|Uxp7`yxF*g-7v9ZIO84_(MgU,l|y7}I' );
define( 'LOGGED_IN_KEY',    '[CERKv;]ZG @hyrO(L2kD0./Wnl4bw]h!nBb53WjaMOyx2(~,#c%v^QkmH&rer^&' );
define( 'NONCE_KEY',        'ccxk@.-iHx(]GF*?+;+(.eqh|2iK[MRBzjctZX.5WlR.5QJwFRsZ]vXu$:v.K/y#' );
define( 'AUTH_SALT',        'Q%A*bTJ1n8% hu|EM>&m0mubX! .pN]T&X2]s%j,@DI#/H? lf3r$Q,;vo?b Bj~' );
define( 'SECURE_AUTH_SALT', '{tD5,Y6sIEj&Wo_VTf1Ci&h&!4_F4JAu=w4Uk4IIlUh.>j?I!05n0o_Pn+i@OmZL' );
define( 'LOGGED_IN_SALT',   'U}qmhNBYE)Nzygcw(jn}|PsGhu{&z_6-4S[cN_5P8TE{%ziKXpf!XZ[w{MPotsY:' );
define( 'NONCE_SALT',       '}6=cvAQu:fN_ta`-69:0Pr9KkVuXBr)_s?*tNjEhujbAi7:K-@;&oWs{_r/&0m#F' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';
