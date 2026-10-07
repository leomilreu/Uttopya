<?php
/** Página de uma notícia. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$home  = home_url( '/' );
$active = 'news';
require_once IRV_SITE_DIR . 'templates/partials/news-helpers.php';
$slug = sanitize_title( get_query_var( 'irv_post' ) );
$categories = irv_blog_categories();
$all_posts = irv_blog_posts();
$post = null;
foreach ( $all_posts as $candidate ) {
	if ( $candidate['slug'] === $slug ) { $post = $candidate; break; }
}
$found = (bool) $post;
if ( ! $post ) {
	status_header( 404 );
	$post = array( 'slug' => '', 'title' => 'Notícia não encontrada', 'date' => '', 'cats' => array(), 'image' => '', 'text' => 'Não encontramos esta notícia. Veja as últimas novidades do Instituto Raphael Veiga na página de notícias.' );
}
$paragraphs = preg_split( '/(?<=[.!?])\s+(?=[A-ZÁÀÂÃÉÊÍÓÔÕÚÇ“#💙✨])/u', $post['text'] );

// "Leia também": prioriza notícias da mesma categoria; completa com as mais recentes.
$related = array();
foreach ( $all_posts as $candidate ) {
	if ( $candidate['slug'] !== $post['slug'] && array_intersect( $candidate['cats'], $post['cats'] ) ) { $related[] = $candidate; }
}
foreach ( $all_posts as $candidate ) {
	if ( count( $related ) >= 3 ) { break; }
	if ( $candidate['slug'] !== $post['slug'] && ! in_array( $candidate, $related, true ) ) { $related[] = $candidate; }
}
$related = array_slice( $related, 0, 3 );

$irv_title = $post['title'];
$irv_description = $found ? wp_trim_words( $post['text'], 30, '…' ) : '';
$irv_body_class = 'irv-post';
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">
<div class="post-original shell">
<nav class="post-category-menu" aria-label="Categorias"><a href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>">Todas as notícias</a><?php foreach ( $categories as $cat_slug => $label ) : ?><a href="<?php echo esc_url( home_url( '/noticias/categoria/' . $cat_slug . '/' ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endforeach; ?></nav>
<article><h1><?php echo esc_html( $post['title'] ); ?></h1><?php if ( $found ) : ?><p class="post-meta">Instituto Raphael Veiga · <?php echo esc_html( $post['date'] ); ?> · 1 min de leitura</p><?php endif; ?><?php if ( $post['image'] ) : ?><img class="post-hero" src="<?php echo irv_news_thumb( $post['image'] ); ?>" decoding="async" alt="<?php echo esc_attr( $post['title'] ); ?>"><?php endif; ?><div class="post-body"><?php foreach ( $paragraphs as $paragraph ) : $paragraph = trim( $paragraph ); if ( ! $paragraph ) { continue; } ?><p><?php echo make_clickable( esc_html( $paragraph ) ); ?></p><?php endforeach; ?></div><div class="post-tags"><?php foreach ( $post['cats'] as $cat ) : ?><a href="<?php echo esc_url( home_url( '/noticias/categoria/' . $cat . '/' ) ); ?>"><?php echo esc_html( $categories[ $cat ] ); ?></a><?php endforeach; ?></div></article>
</div>
<?php if ( $related ) : ?><section class="post-related shell"><h2>Leia também</h2><div class="nw-grid"><?php foreach ( $related as $irv_item ) { require IRV_SITE_DIR . 'templates/partials/news-card.php'; } ?></div></section><?php endif; ?>
<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>
</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
