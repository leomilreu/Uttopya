<?php
/**
 * Plugin Name: IRV — Site Institucional
 * Description: Reconstrução independente do site do Instituto Raphael Veiga em /irv.
 * Version: 0.11.0
 * Author: Uttopya
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IRV_SITE_VERSION', '0.11.0' );
define( 'IRV_SITE_DIR', plugin_dir_path( __FILE__ ) );
define( 'IRV_SITE_URL', plugin_dir_url( __FILE__ ) );
require_once IRV_SITE_DIR . 'includes/blog-data.php';

function irv_site_rewrite() {
	add_rewrite_rule( '^irv/?$', 'index.php?irv_site=home', 'top' );
	add_rewrite_rule( '^quem-somos/?$', 'index.php?irv_site=about', 'top' );
	add_rewrite_rule( '^o-que-fazemos/?$', 'index.php?irv_site=work', 'top' );
	add_rewrite_rule( '^faca-parte/?$', 'index.php?irv_site=join', 'top' );
	add_rewrite_rule( '^noticias/?$', 'index.php?irv_site=news', 'top' );
	add_rewrite_rule( '^noticias/categoria/([^/]+)/?$', 'index.php?irv_site=news&irv_category=$matches[1]', 'top' );
	add_rewrite_rule( '^noticias/([^/]+)/?$', 'index.php?irv_site=post&irv_post=$matches[1]', 'top' );
	add_rewrite_rule( '^politica-de-privacidade/?$', 'index.php?irv_site=privacy', 'top' );
}
add_action( 'init', 'irv_site_rewrite' );

function irv_site_maybe_flush_rewrites() {
	if ( get_option( 'irv_site_rewrite_version' ) !== IRV_SITE_VERSION ) {
		flush_rewrite_rules( false );
		update_option( 'irv_site_rewrite_version', IRV_SITE_VERSION, false );
	}
}
add_action( 'init', 'irv_site_maybe_flush_rewrites', 20 );

function irv_site_query_vars( $vars ) {
	$vars[] = 'irv_site';
	$vars[] = 'irv_post';
	$vars[] = 'irv_category';
	return $vars;
}
add_filter( 'query_vars', 'irv_site_query_vars' );

function irv_site_activate() {
	if ( false === get_option( 'irv_standalone_mode', false ) ) {
		add_option( 'irv_standalone_mode', '1' );
	}
	irv_site_rewrite();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'irv_site_activate' );

function irv_site_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'irv_site_deactivate' );

function irv_site_render() {
	$is_standalone_home = '1' === get_option( 'irv_standalone_mode', '0' ) && is_front_page();
	$page = get_query_var( 'irv_site' );
	if ( ! $page && $is_standalone_home ) {
		$page = 'home';
	}
	if ( ! in_array( $page, array( 'home', 'about', 'work', 'join', 'news', 'post', 'privacy' ), true ) ) {
		return;
	}

	status_header( 200 );
	nocache_headers();
	if ( 'home' === $page ) {
		require IRV_SITE_DIR . 'templates/home.php';
	} elseif ( 'post' === $page ) {
		require IRV_SITE_DIR . 'templates/post.php';
	} else {
		require IRV_SITE_DIR . 'templates/page.php';
	}
	exit;
}
add_action( 'template_redirect', 'irv_site_render', 0 );

function irv_site_redirect_with_status( $anchor, $status ) {
	wp_safe_redirect( add_query_arg( 'form_status', $status, home_url( '/' ) ) . $anchor );
	exit;
}

function irv_site_contact_submit() {
	if ( ! isset( $_POST['irv_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['irv_contact_nonce'] ) ), 'irv_contact' ) ) {
		irv_site_redirect_with_status( '#contato', 'invalid' );
	}
	if ( ! empty( $_POST['website'] ) ) {
		irv_site_redirect_with_status( '#contato', 'sent' );
	}
	$name = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	if ( ! $name || ! is_email( $email ) || ! $message || empty( $_POST['consent'] ) ) {
		irv_site_redirect_with_status( '#contato', 'invalid' );
	}
	$body = "Nome: {$name}\nE-mail: {$email}\n\nMensagem:\n{$message}";
	$sent = wp_mail( 'atendimento@institutoraphaelveiga.org.br', 'Contato pelo site do Instituto Raphael Veiga', $body, array( 'Reply-To: ' . $name . ' <' . $email . '>' ) );
	irv_site_redirect_with_status( '#contato', $sent ? 'sent' : 'error' );
}
add_action( 'admin_post_nopriv_irv_contact', 'irv_site_contact_submit' );
add_action( 'admin_post_irv_contact', 'irv_site_contact_submit' );

function irv_site_newsletter_submit() {
	if ( ! isset( $_POST['irv_newsletter_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['irv_newsletter_nonce'] ) ), 'irv_newsletter' ) ) {
		irv_site_redirect_with_status( '#newsletter', 'invalid' );
	}
	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		irv_site_redirect_with_status( '#newsletter', 'invalid' );
	}
	$subscribers = get_option( 'irv_newsletter_subscribers', array() );
	$subscribers = is_array( $subscribers ) ? $subscribers : array();
	$subscribers[ strtolower( $email ) ] = current_time( 'mysql' );
	update_option( 'irv_newsletter_subscribers', $subscribers, false );
	wp_mail( 'atendimento@institutoraphaelveiga.org.br', 'Nova inscrição na newsletter do IRV', "E-mail: {$email}" );
	irv_site_redirect_with_status( '#newsletter', 'subscribed' );
}
add_action( 'admin_post_nopriv_irv_newsletter', 'irv_site_newsletter_submit' );
add_action( 'admin_post_irv_newsletter', 'irv_site_newsletter_submit' );
