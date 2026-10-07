<?php
/** Página "Notícias" (lista, com filtro por categoria). */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$home  = home_url( '/' );
$active = 'news';
require_once IRV_SITE_DIR . 'templates/partials/news-helpers.php';
$posts = irv_blog_posts();
$categories = irv_blog_categories();
$active_category = sanitize_title( get_query_var( 'irv_category' ) );
if ( $active_category && ! isset( $categories[ $active_category ] ) ) {
	$active_category = '';
}
if ( $active_category ) {
	$posts = array_values( array_filter( $posts, static function ( $post ) use ( $active_category ) {
		return in_array( $active_category, $post['cats'], true );
	} ) );
}
$featured = $posts ? $posts[0] : null;
$rest = $posts ? array_slice( $posts, 1 ) : array();
$irv_title = $active_category ? 'Notícias — ' . $categories[ $active_category ] : 'Notícias';
$irv_description = 'Notícias, eventos e histórias do Instituto Raphael Veiga.';
$irv_body_class = 'irv-inner page-news';
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">
<section class="nw-head shell"><p class="eyebrow"><?php echo $active_category ? 'Notícias' : 'Últimas notícias'; ?></p><h1><?php echo $active_category ? esc_html( ucfirst( mb_strtolower( $categories[ $active_category ] ) ) ) : 'Histórias em movimento'; ?></h1><p class="nw-sub">Atividades, parcerias e conquistas do Instituto Raphael Veiga.</p></section>
<nav class="nw-chips shell" aria-label="Categorias"><a<?php echo $active_category ? '' : ' aria-current="page"'; ?> href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>">Todas</a><?php foreach ( $categories as $category_slug => $category_label ) : ?><a<?php echo $active_category === $category_slug ? ' aria-current="page"' : ''; ?> href="<?php echo esc_url( home_url( '/noticias/categoria/' . $category_slug . '/' ) ); ?>"><?php echo esc_html( ucfirst( mb_strtolower( $category_label ) ) ); ?></a><?php endforeach; ?></nav>
<section class="nw-list shell">
<?php if ( $featured ) : ?>
<article class="nw-feature"><a class="nw-feature__media" href="<?php echo esc_url( home_url( '/noticias/' . $featured['slug'] . '/' ) ); ?>" tabindex="-1" aria-hidden="true"><img src="<?php echo irv_news_thumb( $featured['image'] ); ?>" decoding="async" alt=""></a><div class="nw-feature__body"><p class="nw-kicker"><?php echo $active_category ? 'Em destaque' : 'Mais recente'; ?></p><div class="nw-tags"><?php foreach ( $featured['cats'] as $irv_cat ) : ?><a href="<?php echo esc_url( home_url( '/noticias/categoria/' . $irv_cat . '/' ) ); ?>"><?php echo esc_html( $categories[ $irv_cat ] ); ?></a><?php endforeach; ?></div><h2><a href="<?php echo esc_url( home_url( '/noticias/' . $featured['slug'] . '/' ) ); ?>"><?php echo esc_html( $featured['title'] ); ?></a></h2><p class="nw-excerpt"><?php echo esc_html( irv_news_excerpt( $featured['text'] ) ); ?></p><p class="nw-meta"><?php echo esc_html( $featured['date'] ); ?></p><a class="button button--pink" href="<?php echo esc_url( home_url( '/noticias/' . $featured['slug'] . '/' ) ); ?>">Ler matéria</a></div></article>
<?php endif; ?>
<?php if ( $rest ) : ?><div class="nw-grid"><?php foreach ( $rest as $irv_item ) { require IRV_SITE_DIR . 'templates/partials/news-card.php'; } ?></div><?php endif; ?>
<?php if ( ! $posts ) : ?><p class="news-empty">Ainda não há notícias nesta categoria.</p><?php endif; ?>
</section>
<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>
</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
