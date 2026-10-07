<?php
/** Funções de apoio das páginas de notícias (miniaturas leves e resumo). */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'irv_news_thumb' ) ) {
	/** URL da foto: versão leve em assets/news/ quando existir; senão, o original do Wix. */
	function irv_news_thumb( $image ) {
		$hash = preg_replace( '/^e09d66_([0-9a-f]+)~mv2\..*$/', '$1', $image );
		if ( $hash !== $image && file_exists( IRV_SITE_DIR . 'assets/news/' . $hash . '.webp' ) ) {
			return esc_url( IRV_SITE_URL . 'assets/news/' . $hash . '.webp' );
		}
		return esc_url( IRV_SITE_URL . 'assets/wix/' . $image );
	}
}
if ( ! function_exists( 'irv_news_excerpt' ) ) {
	/** Resumo sem hashtags nem endereços, com no máximo $words palavras. */
	function irv_news_excerpt( $text, $words = 28 ) {
		$text = preg_replace( '~https?://\S+~u', '', $text );
		$text = preg_replace( '/#\S+/u', '', $text );
		$text = trim( preg_replace( '/\s+/u', ' ', $text ) );
		return wp_trim_words( $text, $words, '…' );
	}
}
