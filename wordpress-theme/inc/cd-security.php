<?php
/**
 * Hardening bezpieczeństwa — działa automatycznie przy aktywnym motywie.
 * Zero wtyczek. Wszystko ostrożne, by nie blokować właściciela ani nie psuć mapy/formularzy.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* 1. Zablokuj wbudowany edytor plików motywu/wtyczek (Wygląd → Edytor / Wtyczki → Edytor). */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/* 2. Nagłówki bezpieczeństwa (front-end + REST).
 *    CSP świadomie pominięte — patrz instrukcja „5-ZABEZPIECZENIA” i „dodatki/htaccess-zabezpieczenia.txt”. */
function cd_security_headers() {
	if ( is_admin() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: geolocation=(), microphone=(), camera=(), browsing-topics=()' );
	header( 'X-XSS-Protection: 0' );
}
add_action( 'send_headers', 'cd_security_headers' );

/* 3. Wyłącz XML-RPC (typowy wektor brute-force i pingback-DDoS) + usuń powiązane ślady. */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
} );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/* 4. Nie zdradzaj wersji WordPressa (utrudnia dobranie exploitów). */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/* 5. Ogólny komunikat błędu logowania — nie zdradzaj, czy zły był login czy hasło. */
add_filter( 'login_errors', function () {
	return 'Nieprawidłowe dane logowania.';
} );

/* 6. Utrudnij wykrywanie nazw użytkowników:
 *    - archiwa autora i ?author=N → przekierowanie na stronę główną,
 *    - endpoint REST /wp/v2/users ukryty dla niezalogowanych (zalogowani w panelu działają). */
add_action( 'template_redirect', function () {
	if ( is_admin() ) {
		return;
	}
	if ( is_author() || ( isset( $_GET['author'] ) && '' !== $_GET['author'] ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}, 0 );
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( ! is_user_logged_in() ) {
		unset( $endpoints['/wp/v2/users'] );
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
} );

/* 7. Lekka ochrona przed brute-force logowania (bez wtyczki).
 *    Łagodny próg (10 prób / 15 min na IP), by NIE blokować właściciela.
 *    Po poprawnym logowaniu licznik się zeruje. */
function cd_login_ip() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? (string) $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
	return preg_replace( '/[^0-9a-fA-F:.]/', '', $ip );
}
function cd_login_key() {
	return 'cd_ll_' . md5( cd_login_ip() );
}
add_filter( 'authenticate', function ( $user, $username ) {
	if ( empty( $username ) ) {
		return $user;
	}
	if ( (int) get_transient( cd_login_key() ) >= 10 ) {
		return new WP_Error( 'cd_locked', 'Zbyt wiele prób logowania. Spróbuj ponownie za ~15 minut.' );
	}
	return $user;
}, 30, 2 );
add_action( 'wp_login_failed', function () {
	$key = cd_login_key();
	set_transient( $key, (int) get_transient( $key ) + 1, 15 * MINUTE_IN_SECONDS );
} );
add_action( 'wp_login', function () {
	delete_transient( cd_login_key() );
} );
