<?php
/** Vídeo dentro da matéria. Espera: $video (rótulo em [2]), $video_srcs e $post. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><figure class="pt-video"><video controls playsinline preload="none"<?php echo $post['image'] ? ' poster="' . irv_news_thumb( $post['image'] ) . '"' : ''; ?> aria-label="<?php echo esc_attr( $video[2] ); ?>"><?php foreach ( $video_srcs as $irv_src ) : ?><source src="<?php echo esc_url( $irv_src ); ?>" type="video/mp4"><?php endforeach; ?>Seu navegador não reproduz este vídeo.</video><figcaption><?php echo esc_html( $video[2] ); ?></figcaption></figure>
