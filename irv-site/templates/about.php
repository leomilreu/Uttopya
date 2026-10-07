<?php
/**
 * Template da página "Quem somos".
 *
 * Carregado por irv-site.php quando irv_site=about. As demais páginas internas
 * continuam usando templates/page.php.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$wix   = static function ( $name ) use ( $asset ) { return $asset( 'assets/wix/' . $name ); };
$home  = home_url( '/' );
$page  = 'about';

/*
 * Parceiros. Para trocar um logo: envie o arquivo para assets/partners/ e ajuste o
 * nome aqui. Para incluir outro parceiro, acrescente uma linha: se o arquivo ainda
 * não existir, a vaga aparece reservada (tracejada) até o logo ser enviado.
 * Formato: array( 'Nome do parceiro', 'arquivo.png' ).
 */
$partners = array(
	array( 'Amorino Fios', 'amorino-fios.png' ),
	array( 'Artecafé Crochê', 'artecafe-croche.png' ),
	array( 'Bompar', 'bompar.png' ),
	array( 'Gerdau', 'gerdau.png' ),
	array( 'InCor HCFMUSP', 'incor-hcfmusp.png' ),
	array( 'Fundação Zerbini', 'fundacao-zerbini.png' ),
	array( 'Locar Útil', 'locar-util.png' ),
	array( 'CEMA Instituto', 'cema-instituto.png' ),
	array( 'Omega Ótica e Relojoaria', 'omega-otica.png' ),
	array( 'Sesc', 'sesc.png' ),
	array( 'Prefeitura de São Paulo — Secretaria de Esportes e Lazer', 'prefeitura-sp-esportes.png' ),
	array( 'Prefeitura de São Paulo — Secretaria da Saúde', 'prefeitura-sp-saude.png' ),
);
?><!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Quem somos | Instituto Raphael Veiga</title><meta name="description" content="Conheça a história, a missão e as pessoas do Instituto Raphael Veiga, que promove desenvolvimento integral de crianças e adolescentes por meio do esporte, da arte e da cultura."><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"><link rel="stylesheet" href="<?php echo $asset( 'assets/css/irv.css?v=' . IRV_SITE_VERSION ); ?>"></head>
<body class="irv-site irv-inner page-<?php echo esc_attr( $page ); ?>">
<?php $active = 'about'; require IRV_SITE_DIR . 'templates/partials/header.php'; ?>
<main id="conteudo">

<section class="wix-about-hero" style="--hero:url('<?php echo $wix( 'e09d66_a5a5a21470a64826b40345373e98041d~mv2.jpg' ); ?>')"><div class="shell"><h1>Nascemos de um sonho e crescemos com <em>propósito</em></h1><div class="hero-actions"><a class="button button--pink" href="#sobre">Conheça o instituto</a><a class="button button--outline" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Apoie o IRV</a></div></div></section>

<nav class="about-nav" aria-label="Navegação da página Quem somos"><div class="shell"><a href="#sobre">O Instituto</a><a href="#raphael">Raphael Veiga</a><a href="#nossa-historia">Nossa história</a><a href="#pessoas">Pessoas</a><a href="#transparencia">Transparência</a></div></nav>

<section id="sobre" class="wix-about-intro shell"><div><p class="eyebrow">Sobre o IRV</p><h2>Acreditamos no potencial <br>de cada jovem para transformar <br>o presente e construir <br>novos futuros</h2><p>O Instituto Raphael Veiga (IRV) é uma organização social que nasce do sonho da pedagoga Márcia Cavalcante Veiga, mãe do atleta Raphael Veiga, inspirada no propósito de incentivar crianças e adolescentes a acreditarem em seu potencial, como protagonistas de sua própria história.</p></div><figure><img src="<?php echo $wix( 'e09d66_7290315d3d8744c695d285a2d618ee5f~mv2.jpg' ); ?>" width="1600" height="900" loading="lazy" decoding="async" alt="Professora orientando aluno em atividade"><figcaption>Márcia Cavalcante Veiga, presidente do IRV</figcaption></figure></section>

<section class="irv-triad"><div class="shell"><article><h2>Nossa missão</h2><p>Promover o desenvolvimento de competências socioemocionais em crianças e adolescentes por meio do esporte, da arte e da cultura.</p></article><article><h2>Nossa visão</h2><p>Ser referência nacional na promoção de competências socioemocionais, utilizando o esporte, a arte e a cultura como ferramentas de transformação social.</p></article><article><h2>Nossos valores</h2><ul class="values-list"><li>Acolhimento</li><li>Respeito</li><li>Comprometimento</li><li>Responsabilidade</li><li>Transparência</li></ul></article></div></section>

<section id="raphael" class="raphael"><div class="raphael-photo" style="--photo:url('<?php echo $wix( 'e09d66_2f2d6c72605449688a0d047fa28fb96c~mv2.jpg' ); ?>')"><blockquote>Meu avô deixou um sonho <br>no coração da nossa família: <br>me ver jogar no Palmeiras.</blockquote></div><div class="shell raphael-copy"><p class="eyebrow">História</p><h2>Quem é <br><strong>Raphael Veiga</strong></h2><p>Raphael Cavalcante Veiga, paulistano da Zona Leste de São Paulo, cresceu em São Mateus, onde nasceu seu interesse por futebol. Desde cedo, incentivado pelos seus pais, perseguiu com determinação o sonho de se tornar jogador e construiu uma trajetória que marcou o futebol brasileiro.</p></div></section>

<section class="timeline shell"><article><b>Infância</b><h3>São Mateus e o início do sonho</h3><p>Na Zona Leste de São Paulo, nasceu a sua paixão pelo futebol.</p></article><article><b>2016</b><h3>Profissional no Coritiba</h3><p>O clube paranaense o promoveu ao time principal.</p></article><article><b>2017</b><h3>Um sonho do avô</h3><p>Um bilhete deixado por seu avô Rafael reforçou o desejo de vê-lo no Palmeiras.</p></article><article><b>2018</b><h3>Athletico Paranaense</h3><p>Ano de afirmação e conquista da Copa Sul-Americana.</p></article><article><b>2019 a 2025</b><h3>Ídolo no Palmeiras e Seleção Brasileira</h3><p>Consolidação de uma trajetória marcada por títulos.</p></article><article><b>2022</b><h3>Instituto Raphael Veiga</h3><p>Criação do instituto em São Mateus para ampliar oportunidades.</p></article><article><b>2026</b><h3>América do México</h3><p>Novo capítulo internacional após deixar seu nome na história do Palmeiras.</p></article></section>

<section class="origin"><div class="shell origin-grid"><figure class="origin-card"><img src="<?php echo $wix( 'e09d66_4d8a062dfe52435682345476794d052e~mv2.png' ); ?>" width="850" height="351" loading="lazy" decoding="async" alt="Raphael Veiga com a camisa da Seleção Brasileira"><blockquote><p>Nada disso seria possível sem a força da minha família, da minha fé e das pessoas que sempre acreditaram em mim.</p><cite>Raphael Veiga</cite></blockquote></figure><div class="origin-story"><img src="<?php echo $wix( 'e09d66_6fa83a5e6917465494c2c1b01789b9c0~mv2.png' ); ?>" width="939" height="239" loading="lazy" decoding="async" alt="Instituto Raphael Veiga"><p>Em 2022, Raphael Veiga deu início ao seu principal projeto fora do campo: o Instituto Raphael Veiga, em São Mateus.</p><strong>Um espaço de oportunidades, inclusão e transformação social.</strong></div></div></section>

<section class="achievements"><div class="shell"><header><img src="<?php echo $wix( 'e09d66_8a381c0e2c5d43058db0a98453764c10~mv2.png' ); ?>" width="70" height="70" loading="lazy" decoding="async" alt=""><div><strong>13 títulos</strong><span>Uma trajetória de conquistas</span></div></header><div class="achievements__grid"><article><b>2x</b><span>Libertadores</span></article><article><b>2x</b><span>Campeonato Brasileiro</span></article><article><b>1x</b><span>Copa Sul-Americana</span></article><article><b>1x</b><span>Recopa Sul-Americana</span></article><article><b>1x</b><span>Supercopa do Brasil</span></article><article><b>1x</b><span>Copa do Brasil</span></article><article><b>5x</b><span>Campeonato Paulista</span></article></div></div></section>

<section id="nossa-historia" class="irv-history"><div class="shell"><p class="eyebrow">Nossa história</p><div class="irv-history__intro"><h2>Alguns momentos importantes da história do IRV</h2><p>O nosso trabalho vem sendo desenvolvido a partir da experiência de vários educadores, que, na prática diária, observam e se adaptam às necessidades das crianças e adolescentes.</p></div><div class="history-years"><article><b>2022</b><h3>Primeira ação esportiva</h3><p>Primeira ação esportiva de futebol no Campo Beira, com o “Projeto 23” e fundação jurídica do Instituto Raphael Veiga.</p></article><article><b>2023</b><h3>Atividades regulares</h3><p>Parceria com escola pública e Casa de Cultura São Mateus. Início de Futsal, Handebol, Ballet, Teatro e oficinas de Crochê.</p></article><article><b>2024</b><h3>Nova sede</h3><p>Aluguel do imóvel para sede administrativa, aulas de ballet clássico e oficinas de crochê.</p></article><article><b>2025</b><h3>Expansão</h3><p>Planejamento estratégico, aluguel de quadra poliesportiva, início do vôlei, atividades no contraturno escolar e aprovação na Lei do Incentivo ao Esporte.</p></article><article><b>2026</b><h3>Novo espaço</h3><p>Concessão de uma área pública junto à Prefeitura de São Paulo.</p></article></div></div></section>

<section class="territory" style="--territory:url('<?php echo $wix( 'e09d66_6417dd17487246aa9869d1150c8fa960~mv2.jpg' ); ?>')"><div class="shell"><h2>Presença que transforma <br>o bairro e fortalece a comunidade</h2><p>Distrito de São Mateus, Jardim Nove de Julho, extremo leste da cidade de São Paulo. É nesse território que oferecemos gratuitamente atividades esportivas, artísticas e culturais.</p><a class="button button--pink" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Apoie o IRV</a></div></section>

<section class="partners shell"><header class="partners-head"><div><p class="eyebrow">Parceiros</p><h2>Quem <br>joga junto</h2></div><div><h3>Parcerias que aceleram sonhos</h3><p>A transformação que promovemos acontece junto com parceiros que acreditam no esporte, na educação e no poder de gerar oportunidades. Ao lado de empresas, organizações e instituições comprometidas, levamos educação pra centenas de crianças e adolescentes.</p></div></header><ul class="partner-grid" aria-label="Parceiros do Instituto Raphael Veiga"><?php
foreach ( $partners as $partner ) :
	$file = 'assets/partners/' . $partner[1];
	if ( file_exists( IRV_SITE_DIR . $file ) ) :
		?><li><img src="<?php echo $asset( $file ); ?>" loading="lazy" decoding="async" alt="<?php echo esc_attr( $partner[0] ); ?>"></li><?php
	else :
		?><li class="is-empty"><span class="sr-only"><?php echo esc_html( $partner[0] ); ?></span></li><?php
	endif;
endforeach;
?></ul><a class="partner-cta" href="mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20ser%20parceiro%20do%20IRV">Seja um parceiro do IRV</a></section>

<section id="pessoas" class="team"><div class="shell"><p class="eyebrow">Nossa equipe</p><h2 class="team-title">Gente que transforma junto</h2><div class="team-grid"><?php foreach ( array( 'Arthur Chaves|Professor Assistente', 'Bruno Nascimento|Professor', 'Bruno Otero|Analista de Comunicação', 'Diego Sales|Professor', 'Iara Daher|Gestão de Parcerias e Captação de Recursos', 'Igmar Netto|Coordenadora Pedagógica', 'Ingrid Carsolari|Professora', 'Karen Gonçalves|Professora', 'Milene Oliveira|Gestão Administrativa', 'Vitor Flauzino|Professor' ) as $member ) : $parts = explode( '|', $member ); ?><article><h3><?php echo esc_html( $parts[0] ); ?></h3><p><?php echo esc_html( $parts[1] ); ?></p></article><?php endforeach; ?></div><div class="board"><h2>Nossa diretoria</h2><article><h3>Diretoria</h3><p>Márcia Cavalcante Veiga — Presidente<br>Rubens da Silva Veiga — Vice-Presidente</p></article><article><h3>Conselho Administrativo</h3><p>Márcia Cavalcante Veiga — Presidente<br>Gabriel Veiga — Vice-Presidente<br>Rubens da Silva Veiga — Conselheiro</p></article><article><h3>Conselho Fiscal</h3><p>Marcelo de Oliveira — Presidente<br>Gilberto Diniz — Conselheiro<br>Daniel Santos — Conselheiro</p></article></div></div></section>

<section id="transparencia" class="documents shell"><p class="eyebrow">Transparência</p><h2>Documentos</h2><div><?php foreach ( array( array( 'Relatório de Atividades', '2025', 'e09d66_f3fcf788dcee4b7e95cda50f5fe553d8.pdf' ), array( 'Estatuto Social', '2026', 'e09d66_5270f65f3eea41559d8d88a69a6369b4.pdf' ), array( 'DRE', '2025', 'e09d66_fccd29c9f2b0467f958a45c06b9fca54.pdf' ), array( 'Balanço financeiro', '2025', 'e09d66_5bba0e63b828486ba2f5e3d233ca208e.pdf' ), array( 'Balancete', '2025', 'e09d66_a02a9375303340dda52934502b5477ab.pdf' ), array( 'DRE', '2024', 'e09d66_1878d6eb26eb47ad85390024cda785ca.pdf' ) ) as $doc ) : ?><article><img src="<?php echo $wix( 'e09d66_f47d87fe1c224fc2a5f470f1b8bfa629~mv2.png' ); ?>" width="44" height="44" loading="lazy" decoding="async" alt=""><div><h3><?php echo esc_html( $doc[0] ); ?></h3><p>PDF · <?php echo esc_html( $doc[1] ); ?></p></div><a href="<?php echo esc_url( 'https://fd050c3b-58d1-4440-8228-a7a886a60b02.filesusr.com/ugd/' . $doc[2] ); ?>" aria-label="Baixar <?php echo esc_attr( $doc[0] . ' ' . $doc[1] ); ?> (PDF)">Baixar <span aria-hidden="true">↗</span></a></article><?php endforeach; ?></div></section>

<?php require IRV_SITE_DIR . 'templates/partials/newsletter.php'; ?>

</main>
<?php require IRV_SITE_DIR . 'templates/partials/footer.php'; ?>
</body></html>
