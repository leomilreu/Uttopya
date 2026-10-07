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
$voices = array(
	array( 'e09d66_0d9ab8587ca3487985d9200c388c06ad~mv2.jpg', 'gosto de ouvir músicas', 'Ana Julia, 9 anos' ),
	array( 'e09d66_4c21821cbb4e426dbcd355eaf5432e7d~mv2.jpg', 'gosto de k-pop e de assistir filmes', 'Ana Luzia, 11 anos' ),
	array( 'e09d66_5930376747d3437b982cc5caaef2b3c7~mv2.jpg', 'gosto de empinar pipas', 'Arthur, 11 anos' ),
	array( 'e09d66_0b79bd1c3993415498228f0d273dd083~mv2.jpg', 'gosto de vôlei', 'Isabel, 9 anos' ),
);
require IRV_SITE_DIR . 'templates/partials/head.php';
require IRV_SITE_DIR . 'templates/partials/header.php';
?>
<main id="conteudo">

<section class="sports-hero"><h1 class="sr-only">O que fazemos</h1><img src="<?php echo $wix( 'e09d66_7df141dba9a945eeb011c0d044e3a113~mv2.jpg' ); ?>" width="1600" height="931" decoding="async" alt="Futebol, handebol, vôlei, basquete, ballet e festivais: uma menina em pé diante de um círculo rosa"></section>

<section class="methodology shell"><div><p class="eyebrow">Nossa metodologia</p><h2>Promovemos o desenvolvimento de habilidades socioemocionais</h2><p>A metodologia do Instituto Raphael Veiga é fundamentada no esporte educacional e no ballet educacional, ambos articulados aos princípios da educação integral.</p><p>As atividades são planejadas para ampliar a compreensão do esporte e da arte para além do senso comum, reconhecendo essas práticas em todo o seu potencial educativo, formativo e transformador.</p><p>As aulas combinam o desenvolvimento técnico e prático com o fortalecimento de habilidades socioemocionais.</p></div><img src="<?php echo $wix( 'e09d66_6e9e923e0fc149eaa746ae102d88ed37~mv2.jpg' ); ?>" width="1600" height="1140" loading="lazy" decoding="async" alt="Crianças jogando futsal no Instituto"></section>

<section class="pillars shell"><p class="eyebrow">Nossos pilares</p><h2 class="pillars-title">Atuamos em quatro frentes</h2><div><article style="--card:url('<?php echo $wix( 'e09d66_2fdec79506d440409d8759c86957bcc7~mv2.jpg' ); ?>')"><h3>Educação</h3><p>Estimulamos a aprendizagem e o desenvolvimento integral por meio de metodologias que formam para a vida.</p></article><article style="--card:url('<?php echo $wix( 'e09d66_95b5168807a64fe99cb0769a640e0708~mv2.jpg' ); ?>')"><h3>Esportes</h3><p>Usamos o esporte educacional como ferramenta de inclusão, disciplina, saúde e trabalho em equipe.</p></article><article style="--card:url('<?php echo $wix( 'e09d66_dbf44455e1a24cd4a1d2962d4c3bed1c~mv2.jpg' ); ?>')"><h3>Artes</h3><p>As artes ampliam horizontes, despertam talentos e fortalecem a expressão e a criatividade.</p></article><article style="--card:url('<?php echo $wix( 'e09d66_6b21ade28bc34ed29354d2d6112a93b2~mv2.jpg' ); ?>')"><h3>Cultura</h3><p>Promovemos o acesso à cultura como instrumento de inclusão, cidadania e transformação social.</p></article></div></section>

<section class="impact-wide"><div class="shell"><p class="eyebrow">Nosso impacto</p><h2>Promovemos o desenvolvimento de habilidades socioemocionais</h2><div class="impact-numbers"><div><b>188</b><span>participantes por ano</span></div><div><b>300</b><span>familiares envolvidos</span></div><div><b>350</b><span>uniformes</span></div><div><b>2200</b><span>horas de desenvolvimento</span></div></div></div></section>

<section class="work-impact shell"><article><b>01</b><h2>Direitos</h2><p>Garantimos o acesso ao esporte, à arte e à cultura por meio de atividades gratuitas para crianças e adolescentes de 6 a 14 anos.</p><img src="<?php echo $wix( 'e09d66_d0797cc41df147969ddb3e8f7619a0d6~mv2.jpg' ); ?>" width="1600" height="713" loading="lazy" decoding="async" alt="Atendimento de saúde"></article><article><b>02</b><h2>Território</h2><p>Impactamos positivamente a região de São Mateus, valorizando os saberes locais e ampliando as perspectivas de futuro na comunidade.</p><img src="<?php echo $wix( 'e09d66_a94d98a7e35e46eb9369f47e282aaefc~mv2.jpg' ); ?>" width="1600" height="956" loading="lazy" decoding="async" alt="Crianças dançando"></article><article><b>03</b><h2>Transformação</h2><p>Estimulamos o desenvolvimento de competências socioemocionais, como autoconhecimento, respeito, trabalho em equipe e responsabilidade.</p><img src="<?php echo $wix( 'e09d66_05787aec5eca40299c0619cd0bb77b4b~mv2.jpg' ); ?>" width="1600" height="1321" loading="lazy" decoding="async" alt="Participantes abraçados"></article><article><b>04</b><h2>Vínculos</h2><p>Fortalecemos os vínculos das crianças e dos adolescentes com suas famílias.</p><img src="<?php echo $wix( 'e09d66_3817eaa76a184bfcb6d8025ecf7f3238~mv2.jpg' ); ?>" width="1600" height="1287" loading="lazy" decoding="async" alt="Duas mãos dadas"></article></section>

<section class="participant-voices"><div class="shell"><p class="eyebrow">Vozes que inspiram</p><h2>Nossos participantes</h2><div><?php foreach ( $voices as $voice ) : ?><article><img src="<?php echo $wix( $voice[0] ); ?>" width="180" height="180" loading="lazy" decoding="async" alt="<?php echo esc_attr( $voice[2] ); ?>"><blockquote><?php echo esc_html( $voice[1] ); ?></blockquote><p><?php echo esc_html( $voice[2] ); ?></p></article><?php endforeach; ?></div></div></section>

<section class="believe"><div class="shell"><h2>Acredite no potencial. <br>Transforme o presente. <br>Construa futuros.</h2><p>Com a sua doação, mais crianças e jovens têm acesso à educação, ao esporte, à cultura e a um futuro com mais oportunidades.</p><a class="button button--pink" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Doe agora</a></div></section>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>

</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
