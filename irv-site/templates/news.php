<?php
/** Página "Notícias" (lista, com filtro por categoria). */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$home  = home_url( '/' );
$active = 'news';
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
$irv_title = $active_category ? 'Notícias — ' . $categories[ $active_category ] : 'Notícias';
$irv_description = 'Notícias, eventos e histórias do Instituto Raphael Veiga.';
$irv_body_class = 'irv-inner page-news';
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">
<nav class="news-categories shell" aria-label="Categorias"><a<?php echo $active_category ? '' : ' aria-current="page"'; ?> href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>">Todas as notícias</a><?php foreach ( $categories as $category_slug => $category_label ) : ?><a<?php echo $active_category === $category_slug ? ' aria-current="page"' : ''; ?> href="<?php echo esc_url( home_url( '/noticias/categoria/' . $category_slug . '/' ) ); ?>"><?php echo esc_html( $category_label ); ?></a><?php endforeach; ?></nav>
<section class="news-page shell"><?php if ( $active_category ) : ?><h1 class="category-title"><?php echo esc_html( $categories[ $active_category ] ); ?></h1><?php else : ?><h1 class="sr-only">Notícias</h1><?php endif; ?><div class="news-list"><?php foreach ( $posts as $post ) : ?><article><a class="news-thumb" href="<?php echo esc_url( home_url( '/noticias/' . $post['slug'] . '/' ) ); ?>"><img src="<?php echo $wix( $post['image'] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $post['title'] ); ?>"></a><div><div class="category-links"><?php foreach ( $post['cats'] as $post_cat ) : ?><a class="category" href="<?php echo esc_url( home_url( '/noticias/categoria/' . $post_cat . '/' ) ); ?>"><?php echo esc_html( $categories[ $post_cat ] ); ?></a><?php endforeach; ?></div><h2><a href="<?php echo esc_url( home_url( '/noticias/' . $post['slug'] . '/' ) ); ?>"><?php echo esc_html( $post['title'] ); ?></a></h2><p>Instituto Raphael Veiga · <?php echo esc_html( $post['date'] ); ?> · 1 min de leitura</p></div></article><?php endforeach; ?></div><?php if ( ! $posts ) : ?><p class="news-empty">Ainda não há notícias nesta categoria.</p><?php endif; ?></section>
<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>
</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
