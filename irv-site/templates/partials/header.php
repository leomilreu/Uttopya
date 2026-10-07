<?php
/**
 * Cabeçalho das páginas internas.
 * Espera: $asset (closure), $home (URL da home) e $active (home|about|work|news|join).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$irv_nav = array(
	'home'  => array( 'Início', $home ),
	'about' => array( 'Quem somos', home_url( '/quem-somos/' ) ),
	'work'  => array( 'O que fazemos', home_url( '/o-que-fazemos/' ) ),
	'news'  => array( 'Notícias', home_url( '/noticias/' ) ),
	'join'  => array( 'Faça parte', home_url( '/faca-parte/' ) ),
);
?><a class="skip-link" href="#conteudo">Ir para o conteúdo principal</a>
<header class="site-header"><div class="shell header-inner"><a class="brand" href="<?php echo esc_url( $home ); ?>" aria-label="Instituto Raphael Veiga — início"><img src="<?php echo $asset( 'assets/images/logo.avif' ); ?>" width="264" height="64" alt="Instituto Raphael Veiga"></a><button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-irv">Menu</button><nav id="menu-irv" aria-label="Navegação principal"><?php foreach ( $irv_nav as $irv_key => $irv_item ) : ?><a<?php echo ( isset( $active ) && $active === $irv_key ) ? ' aria-current="page"' : ''; ?> href="<?php echo esc_url( $irv_item[1] ); ?>"><?php echo esc_html( $irv_item[0] ); ?></a><?php endforeach; ?></nav><a class="button button--pink header-cta" href="<?php echo esc_url( home_url( '/faca-parte/' ) ); ?>">Doe agora</a></div></header>
