<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$asset = static function ( $path ) { return esc_url( IRV_SITE_URL . ltrim( $path, '/' ) ); };
$home  = '1' === get_option( 'irv_standalone_mode', '0' ) ? home_url( '/' ) : home_url( '/irv/' );
?><!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Instituto Raphael Veiga | Educação, Esporte, Arte e Cultura</title>
	<meta name="description" content="O Instituto Raphael Veiga promove oportunidades de desenvolvimento integral para crianças e adolescentes por meio do esporte, da arte e da cultura.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $asset( 'assets/css/irv.css?v=' . IRV_SITE_VERSION ); ?>">
</head>
<body class="irv-site">
<a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
<header class="site-header">
	<div class="shell header-inner">
		<a class="brand" href="<?php echo esc_url( $home ); ?>" aria-label="Instituto Raphael Veiga — início"><img src="<?php echo $asset( 'assets/images/logo.avif' ); ?>" width="264" height="64" alt="Instituto Raphael Veiga"></a>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-irv">Menu</button>
		<nav id="menu-irv" aria-label="Navegação principal">
			<a aria-current="page" href="#inicio">Home</a><a href="<?php echo esc_url( home_url( '/quem-somos/' ) ); ?>">Quem somos</a><a href="<?php echo esc_url( home_url( '/o-que-fazemos/' ) ); ?>">O que fazemos</a><a href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>">Notícias</a><a href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Faça parte</a>
		</nav>
		<a class="button button--pink header-cta" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Doe agora</a>
	</div>
</header>

<main id="conteudo">
	<section class="hero" id="inicio">
		<div class="shell hero-inner">
			<div class="hero-copy">
				<h1>Transformar o<br>presente. Construir<br><em>novos futuros.</em></h1>
				<p>Esporte, arte e cultura para ampliar oportunidades<br>e fortalecer o desenvolvimento integral<br>de crianças e adolescentes.</p>
				<div class="hero-actions"><a class="button button--pink" href="#quem-somos">Conheça o instituto</a><a class="button button--outline" href="#faca-parte">Apoie o IRV</a></div>
			</div>
		</div>
		<div class="impact shell" aria-label="Números de impacto">
			<div><svg class="impact-icon" aria-hidden="true" viewBox="0 0 48 48"><circle cx="17" cy="15" r="7"/><circle cx="33" cy="17" r="6"/><path d="M4 41v-7c0-7 5-11 13-11s13 4 13 11v7M31 27c7 0 12 4 12 10v4"/></svg><strong>188</strong><small>participantes por ano</small></div>
			<div><svg class="impact-icon" aria-hidden="true" viewBox="0 0 48 48"><circle cx="13" cy="14" r="6"/><circle cx="35" cy="14" r="6"/><circle cx="24" cy="20" r="5"/><path d="M3 41v-9c0-6 4-10 10-10 4 0 7 2 9 5M45 41v-9c0-6-4-10-10-10-4 0-7 2-9 5M15 42v-7c0-6 4-10 9-10s9 4 9 10v7"/></svg><strong>300</strong><small>familiares envolvidos<br>nas atividades</small></div>
			<div><svg class="impact-icon impact-icon--ball" aria-hidden="true" viewBox="0 0 48 48"><circle cx="24" cy="24" r="19"/><path d="M24 14l7 5-3 8h-8l-3-8 7-5zM24 14V5M31 19l9-3M28 27l5 9M20 27l-5 9M17 19l-9-3M15 36l-1 5M33 36l1 5"/></svg><strong>350</strong><small>uniformes para atletas<br>em desenvolvimento</small></div>
			<div><svg class="impact-icon" aria-hidden="true" viewBox="0 0 48 48"><circle cx="24" cy="24" r="19"/><path d="M24 12v13l9 6"/></svg><strong>2200</strong><small>horas de arte, cultura e<br>esporte todos os anos</small></div>
		</div>
	</section>

	<section class="about shell" id="quem-somos">
		<div class="about-image"><img src="<?php echo $asset( 'assets/images/about.avif' ); ?>" alt="Menino de costas com camiseta do Instituto Raphael Veiga"></div>
		<div class="about-copy"><p class="eyebrow">Sobre o IRV</p><h2>Quem somos</h2><p>Desde 2022, o Instituto Raphael Veiga promove oportunidades de desenvolvimento integral para crianças e adolescentes, por meio do esporte, da arte e da cultura.</p><p>Em parceria com as famílias e com o território, trabalhamos competências socioemocionais como autonomia, respeito, responsabilidade e colaboração.</p><a class="text-link" href="<?php echo esc_url( home_url( '/quem-somos/' ) ); ?>">Conheça a nossa história <span aria-hidden="true">⟶</span></a></div>
	</section>

	<section class="movement"><div class="shell"><div><h2>IRV é mais que movimento.</h2><p>É pertencimento, desenvolvimento e transformação.</p></div></div></section>

	<section class="fronts shell" id="frentes">
		<p class="eyebrow">Sobre o IRV</p><h2>Transformamos realidades em diferentes frentes</h2>
		<div class="front-grid">
			<article tabindex="0" style="--bg:url('<?php echo $asset( 'assets/images/front-1.avif' ); ?>')"><span>01.</span><div><h3>Esporte, arte<br>e cultura</h3><p>Atividades que desenvolvem talentos, promovem saúde e ampliam horizontes.</p></div></article>
			<article tabindex="0" style="--bg:url('<?php echo $asset( 'assets/images/front-2.avif' ); ?>')"><span>02.</span><div><h3>Competências<br>socioemocionais</h3><p>Fortalecemos habilidades para a vida: autonomia, empatia, respeito e colaboração.</p></div></article>
			<article tabindex="0" style="--bg:url('<?php echo $asset( 'assets/images/front-3.avif' ); ?>')"><span>03.</span><div><h3>Parceria<br>com as famílias</h3><p>Caminhamos juntos para garantir apoio, participação e vínculos fortes.</p></div></article>
		</div>
	</section>

	<section class="voices shell">
		<header><p class="eyebrow">Vozes que inspiram</p><h2>Quem são os nossos<br>participantes</h2></header>
		<div class="voice"><img src="<?php echo $asset( 'assets/images/participant-1.avif' ); ?>" alt="Karlos sorrindo e fazendo sinal de positivo"><blockquote>gosto de futebol,<br>handebol e vôlei</blockquote><p><strong>Karlos</strong>, 11 anos</p></div>
		<div class="voice"><img src="<?php echo $asset( 'assets/images/participant-2.avif' ); ?>" alt="Laura sorrindo"><blockquote>gosto de<br>jogar vôlei</blockquote><p><strong>Laura</strong>, 11 anos</p></div>
		<div class="voice"><img src="<?php echo $asset( 'assets/images/participant-3.avif' ); ?>" alt="Mariana sorrindo"><blockquote>gosto de música,<br>ouço todas</blockquote><p><strong>Mariana</strong>, 13 anos</p></div>
	</section>

	<section class="join shell" id="faca-parte">
		<header><p class="eyebrow">Faça parte</p><h2><span>Há muitas formas de</span><span>colocar a transformação</span><span>em movimento</span></h2></header>
		<article class="join-card join-card--pink"><h3>Doe para o IRV</h3><p>Sua doação ajuda a manter nossas atividades e a transformar novas histórias.</p><a class="button button--light" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Doe agora</a></article>
		<article class="join-card"><h3>Torne sua empresa parceira</h3><p>Sua empresa pode gerar impacto social e fortalecer o futuro de muitas crianças e adolescentes.</p><a class="button button--pink" href="mailto:iara.daher@institutoraphaelveiga.org.br?subject=Contato%20pelo%20site%20IRV">Saiba mais</a></article>
		<article class="join-card"><h3>Fortaleça a nossa rede</h3><p>Doe produtos, serviços ou conhecimentos e contribua com o que o IRV faz de melhor.</p><a class="button button--pink" href="mailto:iara.daher@institutoraphaelveiga.org.br?subject=Quero%20doar%20-%20contato%20pelo%20site%20IRV">Entre em contato</a></article>
	</section>

	<section class="news shell" id="noticias">
		<header><div><p class="eyebrow">Últimas notícias</p><h2>Histórias em movimento</h2></div><a class="news-all" href="<?php echo esc_url( home_url( '/noticias/' ) ); ?>">Ver todas as notícias <span aria-hidden="true">⟶</span></a></header>
		<div class="news-grid">
			<article><a href="<?php echo esc_url( home_url( '/noticias/um-time-so-vence-quando-todos-jogam-juntos/' ) ); ?>"><img src="<?php echo $asset( 'assets/images/news-1.avif' ); ?>" alt="Um time só vence quando todos jogam juntos"><div><span class="news-category">Parcerias</span><small>10 de jul.</small><h3>Um time só vence quando todos jogam juntos</h3><span class="news-read">Ler matéria ⟶</span></div></a></article>
			<article><a href="<?php echo esc_url( home_url( '/noticias/dia-da-familia/' ) ); ?>"><img src="<?php echo $asset( 'assets/images/news-2.avif' ); ?>" alt="Dia da Família"><div><span class="news-category">Eventos</span><small>8 de jul.</small><h3>Dia da Família</h3><span class="news-read">Ler matéria ⟶</span></div></a></article>
			<article><a href="<?php echo esc_url( home_url( '/noticias/estamos-em-recesso/' ) ); ?>"><img src="<?php echo $asset( 'assets/images/news-3.avif' ); ?>" alt="Estamos em recesso"><div><span class="news-category">Informativos</span><small>6 de jul.</small><h3>Estamos em recesso</h3><span class="news-read">Ler matéria ⟶</span></div></a></article>
		</div>
	</section>

	<section class="newsletter" id="newsletter"><div class="shell"><div class="newsletter-copy"><svg class="newsletter-icon" aria-hidden="true" viewBox="0 0 48 48"><rect x="5" y="9" width="38" height="30" rx="4"/><path d="m8 13 16 13 16-13"/><path d="m8 36 11-10m21 10L29 26"/></svg><div><h2>Fique por dentro</h2><p>Receba notícias, atividades e histórias<br>do Instituto Raphael Veiga</p></div></div><form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post"><input type="hidden" name="action" value="irv_newsletter"><?php wp_nonce_field( 'irv_newsletter', 'irv_newsletter_nonce' ); ?><label class="sr-only" for="newsletter-email">E-mail</label><input id="newsletter-email" name="email" type="email" autocomplete="email" required placeholder="Insira seu email"><button type="submit">Quero receber</button></form><?php if ( isset( $_GET['form_status'] ) && 'subscribed' === $_GET['form_status'] ) : ?><p class="form-message" role="status">Cadastro realizado.</p><?php endif; ?></div></section>
</main>

<footer class="site-footer"><div class="shell footer-grid">
	<div class="footer-brand"><img src="<?php echo $asset( 'assets/images/footer-logo.avif' ); ?>" alt="Instituto Raphael Veiga"><div class="social"><a href="https://www.instagram.com/institutoraphaelveiga" aria-label="Instagram"><img src="<?php echo $asset( 'assets/images/instagram.png' ); ?>" alt=""></a><a href="https://www.facebook.com/instituto.raphaelveiga" aria-label="Facebook"><img src="<?php echo $asset( 'assets/images/facebook-app-round-white-icon.webp' ); ?>" alt=""></a><a href="https://www.linkedin.com/company/instituto-raphael-veiga/" aria-label="LinkedIn"><img src="<?php echo $asset( 'assets/wix/11062b_7dcffe5daf2944b7be0a46ac6d472634~mv2.png' ); ?>" alt=""></a></div></div>
	<div><h2>Navegação</h2><a href="#inicio">Home</a><a href="#quem-somos">Quem somos</a><a href="#frentes">O que fazemos</a><a href="#noticias">Notícias</a><a href="#faca-parte">Faça parte</a></div>
	<div><h2>Transparência</h2><a href="https://fd050c3b-58d1-4440-8228-a7a886a60b02.filesusr.com/ugd/e09d66_f3fcf788dcee4b7e95cda50f5fe553d8.pdf">Relatórios de Atividades</a><a href="https://fd050c3b-58d1-4440-8228-a7a886a60b02.filesusr.com/ugd/e09d66_fccd29c9f2b0467f958a45c06b9fca54.pdf">Prestação de contas</a><a href="<?php echo esc_url( home_url( '/politica-de-privacidade/' ) ); ?>">Política de privacidade</a><p class="footer-cnpj">CNPJ: 47.732.142/0001-07</p></div>
	<div><h2>Contato</h2><a href="https://wa.me/551120123307">(11) 2012-3307</a><a href="mailto:atendimento@institutoraphaelveiga.org.br">atendimento@institutoraphaelveiga.org.br</a><p>Rua Dr. Paulo Queiroz, 1244<br>Jardim Nove de Julho<br>São Paulo/SP</p></div>
</div><div class="footer-bottom"><div class="shell"><div class="footer-signature">© Instituto Raphael Veiga · <span class="project-credit" data-label="UM PROJETO TOMATO"><span class="project-credit__text"><a class="project-credit__link" href="https://tomatoconsultoria.com/" target="_blank" rel="noopener noreferrer"><span>UM PROJETO </span><span class="project-credit__brand">TOMATO</span></a></span></span></div></div></div></footer>
<a class="whatsapp-float" href="https://wa.me/551120123307" target="_blank" rel="noopener noreferrer" aria-label="Falar com o Instituto Raphael Veiga pelo WhatsApp"><svg aria-hidden="true" viewBox="0 0 32 32"><path d="M16 4A12 12 0 0 0 5.7 22.2L4 28l5.9-1.6A12 12 0 1 0 16 4Z"/><path class="whatsapp-phone" d="M11.1 9.5c-.4 0-.7.2-1 .6-1.2 1.4-.9 3.6.7 6.2 1.8 3 4.6 5.3 7.8 6.4 2.5.8 4.5.2 5.2-.9.4-.7.5-1.5.3-1.7l-3.7-1.8c-.3-.1-.5-.1-.7.2l-1.1 1.4c-.2.3-.5.3-.9.1-1.6-.7-3-1.7-4.1-3.1-.3-.4-.3-.7 0-1l1-1.2c.2-.3.3-.6.1-1l-1.7-3.8c-.2-.4-.5-.5-.9-.5Z"/></svg></a>
<script src="<?php echo $asset( 'assets/js/irv.js?v=' . IRV_SITE_VERSION ); ?>" defer></script>
</body></html>
