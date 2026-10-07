<?php
/** Página de uma notícia. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$home  = home_url( '/' );
$active = 'news';
require_once IRV_SITE_DIR . 'templates/partials/news-helpers.php';
$slug = sanitize_title( get_query_var( 'irv_post' ) );
$categories = irv_blog_categories();
$all_posts = irv_blog_posts();
$post = null;
$pos = -1;
foreach ( $all_posts as $irv_idx => $candidate ) {
	if ( $candidate['slug'] === $slug ) { $post = $candidate; $pos = $irv_idx; break; }
}
$found = (bool) $post;
if ( ! $post ) {
	status_header( 404 );
	$post = array( 'slug' => '', 'title' => 'Notícia não encontrada', 'date' => '', 'cats' => array(), 'image' => '', 'text' => 'Não encontramos esta notícia. Veja as últimas novidades do Instituto Raphael Veiga na página de notícias.' );
}

/*
 * Vídeos das notícias: id do arquivo no Wix (usado enquanto o MP4 nosso não existe em
 * assets/videos/<arquivo>), rótulo e o ponto da matéria em que entra (depois de N parágrafos, ou "end").
 */
$post_videos = array(
	'um-time-so-vence-quando-todos-jogam-juntos' => array( 'e09d66_ea1dc92397df47ff8eb1837d91b6f544', 'noticia-um-time-so-vence.mp4', 'Lei de Incentivo ao Esporte', 'end' ),
	'instituto-raphael-veiga-no-esporte-record-da-tv-record' => array( 'e09d66_68e6ee3e052c43c7a851ef940000f5bf', 'noticia-esporte-record.mp4', 'Reportagem do Esporte Record', 3 ),
);
$post_links = array(
	'instituto-raphael-veiga-no-esporte-record-da-tv-record' => array( 'Ver a publicação original no portal R7', 'https://record.r7.com/esporte-record/video/raphael-veiga-se-prepara-com-o-palmeiras-para-o-mundial-de-clubes-e-apresenta-seu-projeto-social-09062025' ),
);
$video = isset( $post_videos[ $post['slug'] ] ) ? $post_videos[ $post['slug'] ] : null;
$video_srcs = array();
if ( $video ) {
	if ( file_exists( IRV_SITE_DIR . 'assets/videos/' . $video[1] ) ) {
		$video_srcs[] = IRV_SITE_URL . 'assets/videos/' . $video[1];
	}
	$video_srcs[] = 'https://video.wixstatic.com/video/' . $video[0] . '/720p/mp4/file.mp4';
	$video_srcs[] = 'https://video.wixstatic.com/video/' . $video[0] . '/480p/mp4/file.mp4';
}

/* Parágrafos: hashtags viram etiquetas ao final; o resto é texto corrido. */
$paragraphs = preg_split( '/(?<=[.!?])\s+(?=[A-ZÁÀÂÃÉÊÍÓÔÕÚÇ“#💙✨])/u', $post['text'] );
$body = array();
$hashtags = array();
foreach ( $paragraphs as $paragraph ) {
	$paragraph = trim( $paragraph );
	if ( '' === $paragraph ) { continue; }
	if ( '#' === $paragraph[0] ) {
		preg_match_all( '/#\S+/u', $paragraph, $tags );
		$hashtags = array_merge( $hashtags, $tags[0] );
		continue;
	}
	$body[] = $paragraph;
}
$video_at = null;
if ( $video ) { $video_at = 'end' === $video[3] ? count( $body ) : min( (int) $video[3], count( $body ) ); }

/* Anterior / próxima (a lista está da mais recente para a mais antiga). */
$newer = ( $pos > 0 ) ? $all_posts[ $pos - 1 ] : null;
$older = ( $pos >= 0 && $pos < count( $all_posts ) - 1 ) ? $all_posts[ $pos + 1 ] : null;

/* "Leia também": mesma categoria primeiro; completa com as mais recentes. */
$related = array();
foreach ( $all_posts as $candidate ) {
	if ( $candidate['slug'] !== $post['slug'] && array_intersect( $candidate['cats'], $post['cats'] ) ) { $related[] = $candidate; }
}
foreach ( $all_posts as $candidate ) {
	if ( count( $related ) >= 3 ) { break; }
	if ( $candidate['slug'] !== $post['slug'] && ! in_array( $candidate, $related, true ) ) { $related[] = $candidate; }
}
$related = array_slice( $related, 0, 3 );

$post_url = home_url( '/noticias/' . $post['slug'] . '/' );
$share_text = rawurlencode( $post['title'] . ' — ' . $post_url );
$irv_title = $post['title'];
$irv_description = $found ? wp_trim_words( $post['text'], 30, '…' ) : '';
$irv_body_class = 'irv-post';
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<div class="pt-progress" aria-hidden="true"><i></i></div>
<main id="conteudo" class="pt">

<header class="pt-head shell">
	<nav class="pt-crumbs" aria-label="Navegação"><a class="pt-back" href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>"><svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>Voltar às notícias</a></nav>
	<?php if ( $post['cats'] ) : ?><div class="nw-tags"><?php foreach ( $post['cats'] as $irv_cat ) : ?><a href="<?php echo esc_url( home_url( '/noticias/categoria/' . $irv_cat . '/' ) ); ?>"><?php echo esc_html( $categories[ $irv_cat ] ); ?></a><?php endforeach; ?></div><?php endif; ?>
	<h1><?php echo esc_html( $post['title'] ); ?></h1>
	<?php if ( $found ) : ?><p class="pt-meta"><time><?php echo esc_html( $post['date'] ); ?></time></p><?php endif; ?>
</header>

<?php if ( $post['image'] ) : ?><figure class="pt-cover shell"><img src="<?php echo irv_news_thumb( $post['image'] ); ?>" decoding="async" fetchpriority="high" alt="<?php echo esc_attr( $post['title'] ); ?>"></figure><?php endif; ?>

<div class="pt-layout shell">
	<aside class="pt-share" aria-label="Compartilhar">
		<span>Compartilhar</span>
		<a href="https://wa.me/?text=<?php echo $share_text; ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no WhatsApp"><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4A12 12 0 0 0 5.7 22.2L4 28l5.9-1.6A12 12 0 1 0 16 4Zm6.3 16.6c-.3.8-1.5 1.5-2.3 1.6-.6.1-1.4.1-2.2-.1-.5-.2-1.2-.4-2-.8-3.5-1.5-5.8-5-6-5.3-.2-.2-1.4-1.9-1.4-3.6 0-1.7.9-2.5 1.2-2.9.3-.3.7-.4.9-.4h.7c.2 0 .5-.1.8.6l1.1 2.7c.1.2.1.4 0 .6l-.4.6-.5.5c-.2.2-.3.4-.1.7.2.3.8 1.3 1.7 2.1 1.2 1 2.2 1.4 2.5 1.5.3.2.5.1.7-.1l.9-1.1c.2-.3.4-.2.7-.1l2.4 1.2c.3.1.5.2.6.3.1.3.1.9-.2 1.7Z"/></svg></a>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( $post_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8.2h2.8l.4-3.2h-3.2V8.6c0-.9.3-1.6 1.6-1.6h1.7V4.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.3H7.3v3.2h2.8V22h3.4Z"/></svg></a>
		<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( $post_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5.2 9.5h3.2V20H5.2V9.5ZM6.8 4.2a1.9 1.9 0 1 1 0 3.8 1.9 1.9 0 0 1 0-3.8ZM10.4 9.5h3v1.4c.5-.9 1.6-1.7 3.2-1.7 3.3 0 3.9 2.1 3.9 4.9V20h-3.2v-5.2c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7V20h-3.2V9.5Z"/></svg></a>
		<button type="button" data-copy="<?php echo esc_url( $post_url ); ?>" aria-label="Copiar link"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10.6 13.4a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1M13.4 10.6a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg><b class="pt-copied" role="status"></b></button>
	</aside>

	<article class="pt-article">
		<?php foreach ( $body as $irv_i => $paragraph ) : ?>
			<?php if ( null !== $video_at && $irv_i === $video_at ) { include IRV_SITE_DIR . 'templates/partials/post-video.php'; } ?>
			<p<?php echo 0 === $irv_i ? ' class="pt-lead"' : ''; ?>><?php echo make_clickable( esc_html( $paragraph ) ); ?></p>
		<?php endforeach; ?>
		<?php if ( null !== $video_at && count( $body ) === $video_at ) { include IRV_SITE_DIR . 'templates/partials/post-video.php'; } ?>
		<?php if ( isset( $post_links[ $post['slug'] ] ) ) : ?><p><a class="button button--pink" href="<?php echo esc_url( $post_links[ $post['slug'] ][1] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $post_links[ $post['slug'] ][0] ); ?></a></p><?php endif; ?>
		<?php if ( $hashtags ) : ?><ul class="pt-hashtags" aria-label="Hashtags"><?php foreach ( $hashtags as $irv_tag ) : ?><li><?php echo esc_html( $irv_tag ); ?></li><?php endforeach; ?></ul><?php endif; ?>
	</article>
</div>

<?php if ( $newer || $older ) : ?><nav class="pt-pager shell" aria-label="Outras notícias"><?php if ( $newer ) : ?><a class="pt-pager__prev" href="<?php echo esc_url( home_url( '/noticias/' . $newer['slug'] . '/' ) ); ?>"><small>← Mais recente</small><strong><?php echo esc_html( $newer['title'] ); ?></strong></a><?php else : ?><span></span><?php endif; ?><?php if ( $older ) : ?><a class="pt-pager__next" href="<?php echo esc_url( home_url( '/noticias/' . $older['slug'] . '/' ) ); ?>"><small>Mais antiga →</small><strong><?php echo esc_html( $older['title'] ); ?></strong></a><?php endif; ?></nav><?php endif; ?>

<?php if ( $related ) : ?><section class="post-related shell"><h2>Leia também</h2><div class="nw-grid"><?php foreach ( $related as $irv_item ) { require IRV_SITE_DIR . 'templates/partials/news-card.php'; } ?></div></section><?php endif; ?>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>
</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
