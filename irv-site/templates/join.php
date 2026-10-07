<?php
/** Página "Faça parte". */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$home  = home_url( '/' );
$active = 'join';
$irv_title = 'Faça parte';
$irv_description = 'Doe, seja voluntário ou torne sua empresa parceira do Instituto Raphael Veiga e ajude a transformar a vida de crianças e adolescentes.';
$irv_body_class = 'irv-inner page-join';
$stories = array(
	array( 'e09d66_06e9c27e1f0244c2a19ebc423f8de8dc~mv2.png', 'Conheça o Paulo', 'Veja o Paulo contando sobre o IRV e como foi importante pra ele ter essa oportunidade.' ),
	array( 'e09d66_e5660ebcfb714f73b031e69473ec86f9~mv2.png', 'Conheça a Ludmila', 'Veja o que a Ludmila tem a dizer sobre o processo de entrada dela e como tem sido sua participação no IRV.' ),
	array( 'e09d66_b16e353429a6409fbec1e86e491a184c~mv2.png', 'Saiba mais sobre a Clarissa', 'Clarissa falando os motivos que fazem do IRV um lugar especial.' ),
);
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">

<section class="join-hero" style="--hero:url('<?php echo $wix( 'e09d66_29b31aa4cde04898bc9084e12b164d9a~mv2.jpg' ); ?>')"><div class="shell"><h1>Toda transformação <br>precisa de gente <br>que jogue junto</h1><a class="button button--pink" href="#doacao">Quero doar</a></div></section>

<section class="join-ways shell"><p class="eyebrow">Faça parte</p><h2>Existem muitas formas de fazer parte</h2><div><article><h3>Faça uma doação</h3><p>Sua doação se transforma em oportunidades reais para crianças e adolescentes.</p><a href="#doacao">Quero doar</a></article><article><h3>Seja voluntário</h3><p>Compartilhe o seu tempo, talentos e experiências com quem precisa.</p><a href="mailto:atendimento@institutoraphaelveiga.org.br?subject=Quero%20ser%20volunt%C3%A1rio%20do%20IRV">Quero ser voluntário</a></article><article><h3>Parcerias empresariais</h3><p>Sua empresa investindo em educação e gerando impacto social.</p><a href="mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20ser%20parceiro%20do%20IRV">Quero saber mais</a></article><article><h3>Doação de materiais</h3><p>Doe produtos e serviços que apoiam os nossos projetos.</p><a href="mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20doar%20produtos%20ou%20servi%C3%A7os">Quero doar</a></article></div></section>

<section id="doacao" class="donation"><div class="shell"><img src="<?php echo $wix( 'e09d66_9569068a1df04950bf3114b7477af7af~mv2.jpg' ); ?>" width="1600" height="1067" loading="lazy" decoding="async" alt="Participantes do Instituto"><div><h2>Faça a diferença!</h2><p>Doações recorrentes fortalecem o nosso trabalho, garantindo a continuidade das nossas ações. Contribua agora e construa um Brasil com oportunidades de desenvolvimento para todas as crianças e adolescentes.</p><fieldset><legend>Com que frequência você quer doar?</legend><label><input type="radio" name="frequency" checked> 1 vez</label><label><input type="radio" name="frequency"> Mensal</label></fieldset><fieldset><legend>Qual valor?</legend><label><input type="radio" name="amount"> R$ 30</label><label><input type="radio" name="amount"> R$ 50</label><label><input type="radio" name="amount"> R$ 70</label><label><input type="radio" name="amount"> R$ 100</label><label><input type="radio" name="amount"> R$ 200</label><label><input type="radio" name="amount"> Outro</label></fieldset><p class="donation-note">A etapa de pagamento será conectada à conta recebedora oficial do Instituto.</p></div></div></section>

<section class="impact-wide"><div class="shell"><p class="eyebrow">Faça parte</p><h2>Seu apoio gera impacto real</h2><div class="impact-numbers"><div><b>188</b><span>participantes por ano</span></div><div><b>300</b><span>familiares</span></div><div><b>350</b><span>uniformes</span></div><div><b>2200</b><span>horas de desenvolvimento</span></div></div></div></section>

<section class="video-stories shell"><p class="eyebrow">Depoimentos dos participantes do IRV</p><div><?php foreach ( $stories as $story ) : ?><article><div class="video-poster"><img src="<?php echo $wix( $story[0] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $story[1] ); ?>"><span aria-hidden="true">▶</span></div><h2><?php echo esc_html( $story[1] ); ?></h2><p><?php echo esc_html( $story[2] ); ?></p></article><?php endforeach; ?></div></section>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>

</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
