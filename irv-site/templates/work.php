<?php
/** Página "O que fazemos". */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$home  = home_url( '/' );
$active = 'work';
$irv_title = 'O que fazemos';
$irv_description = 'Conheça a metodologia e as quatro frentes de atuação do Instituto Raphael Veiga: educação, esportes, artes e cultura.';
$irv_body_class = 'irv-inner page-work';

/*
 * Pilares. Campos: id, título, texto curto, texto do "Saiba mais", ícone, foto e
 * ponto de foco da foto (x% y%), que define qual parte da imagem fica visível.
 */
$pillars = array(
	array( 'educacao', 'Educação', 'Estimulamos a aprendizagem e o desenvolvimento integral por meio de metodologias que formam para a vida.', 'Acreditamos na educação como caminho para ampliar possibilidades e fortalecer trajetórias. Desenvolvemos ações que estimulam a aprendizagem, a autonomia e o protagonismo de crianças e adolescentes, em diálogo com suas vivências, seus territórios e seus projetos de vida.', 'e09d66_90aa7d470107407f8ee2a09899245813~mv2.png', 'e09d66_2fdec79506d440409d8759c86957bcc7~mv2.jpg', '51% 61%', 'Menino de azul levantando a mão' ),
	array( 'esportes', 'Esportes', 'Usamos o esporte educacional como ferramenta de inclusão, disciplina, saúde e trabalho em equipe.', 'Por meio de atividades esportivas de qualidade, promovemos autoconhecimento, respeito, trabalho em equipe e responsabilidade, além de saúde e bem-estar, contribuindo para o desenvolvimento físico, emocional e social dos participantes.', 'e09d66_5de483a12b6f44748732e17edf180b8f~mv2.png', 'e09d66_95b5168807a64fe99cb0769a640e0708~mv2.jpg', '55% 73%', 'Menina de azul segurando uma bola' ),
	array( 'artes', 'Artes', 'As artes ampliam horizontes, despertam talentos e fortalecem a expressão e a criatividade.', 'As artes ocupam um lugar especial em nossa proposta de desenvolvimento integral. Elas expandem repertórios, despertam sensibilidades e oferecem novas possibilidades de expressão, permitindo que alunas e alunos bailarinos explorem sua criatividade e fortaleçam suas identidades.', 'e09d66_4c5a617d69624cfea62b27825f9c8e6a~mv2.png', 'e09d66_dbf44455e1a24cd4a1d2962d4c3bed1c~mv2.jpg', '51% 54%', 'Meninas dançando balé' ),
	array( 'cultura', 'Cultura', 'Promovemos o acesso à cultura como instrumento de inclusão, cidadania e transformação social.', 'Entendemos a cultura como direito e como dimensão fundamental da formação humana. Por isso, promovemos o acesso a vivências culturais que ampliam horizontes, aproximam os participantes de diferentes linguagens e fortalecem o vínculo com a comunidade e com o território.', 'e09d66_a492a534ec3e47ea99e07954043ece75~mv2.png', 'e09d66_6b21ade28bc34ed29354d2d6112a93b2~mv2.jpg', '50% 50%', 'Menino de azul em exposição' ),
);

/* Impacto: número, título, texto, foto, foco da foto, texto alternativo. */
$impact = array(
	array( '01', 'Direitos', 'Garantimos o acesso ao esporte, à arte e à cultura, por meio de atividades gratuitas para crianças e adolescentes de 6 a 14 anos.', 'e09d66_d0797cc41df147969ddb3e8f7619a0d6~mv2.jpg', '51% 68%', 'Menina sendo examinada por médica' ),
	array( '02', 'Território', 'Impactamos positivamente a região de São Mateus, valorizando os saberes locais e ampliando as perspectivas de futuro na comunidade.', 'e09d66_a94d98a7e35e46eb9369f47e282aaefc~mv2.jpg', '68% 62%', 'Crianças dançando' ),
	array( '03', 'Transformação', 'Estimulamos o desenvolvimento de competências socioemocionais, como autoconhecimento, respeito, trabalho em equipe e responsabilidade.', 'e09d66_05787aec5eca40299c0619cd0bb77b4b~mv2.jpg', '50% 45%', 'Dois meninos abraçados' ),
	array( '04', 'Vínculos', 'Fortalecemos os vínculos das crianças e dos adolescentes com suas famílias.', 'e09d66_3817eaa76a184bfcb6d8025ecf7f3238~mv2.jpg', '50% 50%', 'Duas mãos dadas' ),
);

$voices = array(
	array( 'ana-julia.webp', 'gosto de ouvir músicas', 'Ana Julia', '9 anos', '50% 22%' ),
	array( 'ana-luzia.webp', 'gosto de k-pop e de assistir filmes', 'Ana Luzia', '11 anos', '50% 24%' ),
	array( 'arthur.webp', 'gosto de empinar pipas', 'Arthur', '11 anos', '50% 20%' ),
	array( 'isabel.webp', 'gosto de vôlei', 'Isabel', '9 anos', '55% 22%' ),
);
$marquee = array( 'Futebol', 'Handebol', 'Vôlei', 'Basquete', 'Ballet', 'Festivais' );

require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">

<section class="sports-hero"><h1 class="sr-only">O que fazemos</h1><img class="deco deco--brush" src="<?php echo $wix( 'e09d66_99566f94404a4aef9fbe32cdccf1d561~mv2.png' ); ?>" width="553" height="425" decoding="async" alt=""><img src="<?php echo $wix( 'e09d66_7df141dba9a945eeb011c0d044e3a113~mv2.jpg' ); ?>" width="1600" height="931" decoding="async" alt="Futebol, handebol, vôlei, basquete, ballet e festivais: uma menina em pé diante de um círculo rosa"></section>



<div class="work-band">
<section class="methodology shell">
	<img class="deco deco--arrow" src="<?php echo $wix( 'e09d66_5725dcf6e841451b9c27e847a13ca8c1~mv2.png' ); ?>" width="140" height="210" loading="lazy" decoding="async" alt="">
	<div class="methodology-head"><p class="eyebrow">Nossa metodologia</p><h2>Promovemos o desenvolvimento de <span class="brush">habilidades socioemocionais</span></h2></div>
	<div class="methodology-copy"><p>A metodologia do <strong>Instituto Raphael Veiga</strong> é fundamentada no esporte educacional e no ballet educacional, ambos articulados aos princípios da educação integral.</p><p>As atividades são planejadas para ampliar a compreensão do esporte e da arte para além do senso comum, reconhecendo essas práticas em todo o seu potencial educativo, formativo e transformador.</p><p>As aulas combinam o desenvolvimento técnico e prático, por meio do ensino de fundamentos, regras, dinâmicas e esquemas de jogo, com o fortalecimento de habilidades socioemocionais. Ao longo das atividades, buscamos estimular competências como <strong>autoconhecimento</strong>, <strong>respeito</strong>, <strong>responsabilidade</strong>, <strong>cooperação</strong> e <strong>trabalho em equipe</strong>, essenciais para a formação integral de crianças e adolescentes.</p></div>
</section>

<section class="pillars shell"><p class="eyebrow">Nossos pilares</p><h2 class="pillars-title">Atuamos em quatro frentes</h2><div class="pillar-grid"><?php foreach ( $pillars as $pillar ) : ?><article class="pillar" data-pillar>
	<div class="pillar-media"><img src="<?php echo $wix( $pillar[5] ); ?>" style="object-position:<?php echo esc_attr( $pillar[6] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $pillar[7] ); ?>"><img class="pillar-icon" src="<?php echo $wix( $pillar[4] ); ?>" width="55" height="55" loading="lazy" decoding="async" alt=""></div>
	<div class="pillar-body"><h3><?php echo esc_html( $pillar[1] ); ?></h3><p><?php echo esc_html( $pillar[2] ); ?></p>
	<button class="pillar-more" type="button" aria-expanded="false" aria-controls="pillar-<?php echo esc_attr( $pillar[0] ); ?>"><span>Saiba mais</span><i aria-hidden="true"></i></button>
	<div class="pillar-extra" id="pillar-<?php echo esc_attr( $pillar[0] ); ?>"><div><p><?php echo esc_html( $pillar[3] ); ?></p></div></div></div>
</article><?php endforeach; ?></div></section>

</div>

<section class="impact-band"><div class="shell"><h2 class="impact-eyebrow">Nosso impacto</h2><ol class="impact-list"><?php foreach ( $impact as $item ) : ?><li class="impact-row"><b class="impact-num" aria-hidden="true"><?php echo esc_html( $item[0] ); ?></b><span class="impact-dot" aria-hidden="true"></span><div class="impact-text"><h3><span class="sr-only"><?php echo esc_html( $item[0] ); ?> — </span><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div><div class="impact-photo"><img src="<?php echo $wix( $item[3] ); ?>" style="object-position:<?php echo esc_attr( $item[4] ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $item[5] ); ?>"></div></li><?php endforeach; ?></ol></div></section>

<section class="participant-voices"><div class="shell"><header class="voices-head"><p class="eyebrow">Vozes que inspiram</p><h2>Nossos participantes</h2></header><div class="voices-grid"><?php foreach ( $voices as $voice ) : ?><figure class="voice-card"><img src="<?php echo $asset( 'assets/voices/' . $voice[0] ); ?>" style="object-position:<?php echo esc_attr( $voice[4] ); ?>" width="800" height="800" loading="lazy" decoding="async" alt="<?php echo esc_attr( $voice[2] . ', ' . $voice[3] ); ?>"><figcaption><blockquote><?php echo esc_html( $voice[1] ); ?></blockquote><p class="voice-who"><strong><?php echo esc_html( $voice[2] ); ?></strong><span><?php echo esc_html( $voice[3] ); ?></span></p></figcaption></figure><?php endforeach; ?></div></div></section>

<section class="believe"><div class="shell"><h2>Acredite no potencial. <br>Transforme o presente. <br>Construa futuros.</h2><p>Com a sua doação, mais crianças e jovens têm acesso à educação, ao esporte, à cultura e a um futuro com mais oportunidades.</p><a class="button button--pink" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Doe agora</a></div></section>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>

</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
