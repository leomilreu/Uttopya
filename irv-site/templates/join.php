<?php
/** Página "Faça parte". */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$has   = static function ( $path ) { return file_exists( IRV_SITE_DIR . ltrim( $path, '/' ) ); };
$home  = home_url( '/' );
$active = 'join';
$irv_title = 'Faça parte';
$irv_description = 'Doe, torne sua empresa parceira ou contribua com materiais e ajude a transformar a vida de crianças e adolescentes no Instituto Raphael Veiga.';
$irv_body_class = 'irv-inner page-join';

/* Formas de participar (o ícone vem do Wix). */
$ways = array(
	array( 'Faça uma doação', 'Sua doação se transforma em oportunidades reais para crianças e adolescentes.', 'Quero doar', '#doacao', 'e09d66_f4268fe5172142358fcecc8f233f02e8~mv2.png', true ),
	array( 'Parcerias empresariais', 'Sua empresa investindo em educação e gerando impacto social.', 'Quero saber mais', 'mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20ser%20parceiro%20do%20IRV', 'e09d66_1ad013f622a546c7b5f503f644c2933e~mv2.png', false ),
	array( 'Doação de materiais', 'Doe produtos e serviços que apoiam os nossos projetos.', 'Quero doar', 'mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20doar%20produtos%20ou%20servi%C3%A7os', 'e09d66_74b38901c63547cd8878ece07c3d50bb~mv2.png', false ),
);

/*
 * Depoimentos: título, texto, pôster e vídeo (opcional). Para tocar um vídeo, envie o
 * arquivo MP4 para assets/videos/ com o nome indicado; sem o arquivo, o card fica só com a foto.
 */
$stories = array(
	array( 'Conheça o Paulo', 'Veja o Paulo contando sobre o IRV e como foi importante pra ele ter essa oportunidade.', 'story-1.webp', 'depoimento-paulo.mp4' ),
	array( 'Conheça a Ludmila', 'Veja o que a Ludmila tem a dizer sobre o processo de entrada dela e como tem sido sua participação no IRV.', 'story-2.webp', 'depoimento-ludmila.mp4' ),
	array( 'Saiba mais sobre a Clarissa', 'Clarissa falando os motivos que fazem do IRV um lugar especial.', 'story-3.webp', 'depoimento-clarissa.mp4' ),
);

/* Galeria: arquivo (em assets/gallery/), legenda e tipo (foto ou vídeo). Itens sem arquivo não aparecem. */
$gallery = array(
	array( 'g01.webp', 'Aula de ballet no Instituto', 'image' ),
	array( 'g02.webp', 'Crianças jogando futsal', 'image' ),
	array( 'g03.webp', 'Turma reunida na quadra', 'image' ),
	array( 'g04.webp', 'Menino de azul levantando a mão', 'image' ),
	array( 'g05.webp', 'Menina com a bola de handebol', 'image' ),
	array( 'g06.webp', 'Apresentação de dança no Dia da Família', 'image' ),
	array( 'g07.webp', 'Dois meninos abraçados', 'image' ),
	array( 'g08.webp', 'Duas mãos dadas', 'image' ),
	array( 'g09.webp', 'Inauguração da biblioteca', 'image' ),
	array( 'g10.webp', 'Turma do Jr. NBA', 'image' ),
	array( 'g11.webp', 'Visita ao Museu do Futebol', 'image' ),
	array( 'g12.webp', 'Crianças observando uma tela interativa', 'image' ),
);
$gallery = array_values( array_filter( $gallery, static function ( $g ) use ( $has ) { return $has( 'assets/gallery/' . $g[0] ); } ) );

require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">

<section class="jn-hero"><img src="<?php echo $asset( 'assets/join/hero.webp' ); ?>" width="1600" height="900" decoding="async" fetchpriority="high" alt=""><div class="shell jn-hero__inner"><p class="jn-kicker">Faça parte</p><h1>Toda transformação <br>precisa de gente <br>que jogue junto</h1><a class="button button--pink" href="#doacao">Quero doar</a></div></section>

<section class="jn-ways shell"><h2 class="jn-ways__title">Existem muitas formas de <span class="jn-script"><img src="<?php echo $wix( 'e09d66_d6947bd1d1cf4dd9b80e81cc4934fa5c~mv2.png' ); ?>" width="725" height="215" loading="lazy" decoding="async" alt="fazer parte"></span></h2><div class="jn-ways__grid"><?php foreach ( $ways as $way ) : ?><article class="jn-way<?php echo $way[5] ? ' jn-way--hl' : ''; ?>"><span class="jn-way__icon"><img src="<?php echo $wix( $way[4] ); ?>" width="84" height="84" loading="lazy" decoding="async" alt=""></span><h3><?php echo esc_html( $way[0] ); ?></h3><p><?php echo esc_html( $way[1] ); ?></p><a class="jn-way__link" href="<?php echo esc_url( $way[3] ); ?>"><?php echo esc_html( $way[2] ); ?> <i aria-hidden="true"></i></a></article><?php endforeach; ?></div></section>

<section id="doacao" class="jn-donate"><div class="shell jn-donate__grid"><div class="jn-donate__photo"><img src="<?php echo $asset( 'assets/join/donate.webp' ); ?>" width="1100" height="1467" loading="lazy" decoding="async" alt="Participantes do Instituto se abraçando"></div><form class="jn-form" data-donate action="#" method="get"><h2>Faça a diferença!</h2><p class="jn-lead">Doações recorrentes fortalecem o nosso trabalho, garantindo a continuidade das nossas ações. Contribua agora e construa um Brasil com oportunidades de desenvolvimento para todas as crianças e adolescentes.</p>
<fieldset class="jn-seg"><legend>Com que frequência você quer doar?</legend><label><input type="radio" name="frequency" value="1 vez" checked><span>1 vez</span></label><label><input type="radio" name="frequency" value="mensal"><span>Mensal</span></label></fieldset>
<fieldset class="jn-amounts"><legend>Qual valor?</legend><?php foreach ( array( 30, 50, 70, 100, 200 ) as $irv_value ) : ?><label><input type="radio" name="amount" value="<?php echo (int) $irv_value; ?>"<?php echo 50 === $irv_value ? ' checked' : ''; ?>><span>R$ <?php echo (int) $irv_value; ?></span></label><?php endforeach; ?><label><input type="radio" name="amount" value="other"><span>Outro</span></label></fieldset>
<label class="jn-other" hidden><span>Digite o valor (R$)</span><input type="number" min="5" step="1" inputmode="numeric" name="other" placeholder="Ex.: 150"></label>
<a class="button button--pink jn-submit" data-donate-btn href="mailto:atendimento@institutoraphaelveiga.org.br?subject=Quero%20doar">Doar R$ 50</a>
<p class="jn-note">A etapa de pagamento será conectada à conta recebedora oficial do Instituto. Por enquanto, o botão abre uma mensagem de e-mail com o valor escolhido.</p></form></div></section>

<section class="impact-wide"><div class="shell"><p class="eyebrow">Faça parte</p><h2>Seu apoio gera impacto real</h2><div class="impact-numbers"><div><b>188</b><span>participantes por ano</span></div><div><b>300</b><span>familiares envolvidos</span></div><div><b>350</b><span>uniformes</span></div><div><b>2200</b><span>horas de desenvolvimento</span></div></div></div></section>

<section class="jn-stories shell"><p class="eyebrow">Depoimentos dos participantes do IRV</p><div class="jn-stories__grid"><?php foreach ( $stories as $story ) : $irv_video = $has( 'assets/videos/' . $story[3] ) ? $asset( 'assets/videos/' . $story[3] ) : ''; ?><article class="jn-story"><<?php echo $irv_video ? 'button type="button" data-viewer data-type="video" data-src="' . esc_attr( $irv_video ) . '" data-caption="' . esc_attr( $story[0] ) . '"' : 'div'; ?> class="jn-story__media"><img src="<?php echo $asset( 'assets/join/' . $story[2] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $story[0] ); ?>"><span class="jn-play" aria-hidden="true"></span><?php echo $irv_video ? '<span class="sr-only">Reproduzir vídeo</span></button>' : '</div>'; ?><h3><?php echo esc_html( $story[0] ); ?></h3><p><?php echo esc_html( $story[1] ); ?></p></article><?php endforeach; ?></div></section>

<?php if ( $gallery ) : ?><section class="jn-gallery shell" aria-labelledby="jn-gallery-title"><div class="jn-gallery__head"><p class="eyebrow">Momentos do IRV</p><h2 id="jn-gallery-title">Galeria</h2></div><div class="jn-gallery__grid"><?php foreach ( $gallery as $irv_i => $item ) : ?><button type="button" class="jn-tile jn-tile--<?php echo (int) ( $irv_i % 6 ); ?>" data-viewer data-type="<?php echo esc_attr( $item[2] ); ?>" data-src="<?php echo $asset( 'assets/gallery/' . $item[0] ); ?>" data-caption="<?php echo esc_attr( $item[1] ); ?>"><img src="<?php echo $asset( 'assets/gallery/' . $item[0] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $item[1] ); ?>"><span class="jn-tile__cap"><?php echo esc_html( $item[1] ); ?></span></button><?php endforeach; ?></div></section><?php endif; ?>

<dialog class="jn-viewer" id="jn-viewer" aria-label="Visualizador de mídia"><button type="button" class="jn-viewer__close" data-viewer-close aria-label="Fechar">×</button><div class="jn-viewer__stage"></div><p class="jn-viewer__cap"></p></dialog>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>

</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
