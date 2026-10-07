<?php
/** Card de notícia (foto ao fundo). Espera: $irv_item e $categories. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$irv_url = home_url( '/noticias/' . $irv_item['slug'] . '/' );
?><article class="nw-card"><img src="<?php echo irv_news_thumb( $irv_item['image'] ); ?>" loading="lazy" decoding="async" alt=""><div class="nw-card__body"><div class="nw-tags"><?php foreach ( $irv_item['cats'] as $irv_cat ) : ?><a href="<?php echo esc_url( home_url( '/noticias/categoria/' . $irv_cat . '/' ) ); ?>"><?php echo esc_html( $categories[ $irv_cat ] ); ?></a><?php endforeach; ?></div><h3><a class="nw-link" href="<?php echo esc_url( $irv_url ); ?>"><?php echo esc_html( $irv_item['title'] ); ?></a></h3><p class="nw-meta"><?php echo esc_html( $irv_item['date'] ); ?> · 1 min de leitura</p><span class="nw-more" aria-hidden="true">Ler matéria <i></i></span></div></article>
