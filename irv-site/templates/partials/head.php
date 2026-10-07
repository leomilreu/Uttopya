<?php
/**
 * Abertura do documento das páginas internas (doctype, <head> e <body>).
 * Espera: $asset, $irv_title, $irv_description (opcional) e $irv_body_class.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?php echo esc_html( $irv_title ); ?> | Instituto Raphael Veiga</title><?php if ( ! empty( $irv_description ) ) : ?><meta name="description" content="<?php echo esc_attr( $irv_description ); ?>"><?php endif; ?><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"><link rel="stylesheet" href="<?php echo $asset( 'assets/css/irv.css?v=' . IRV_SITE_VERSION ); ?>"></head>
<body class="irv-site <?php echo esc_attr( $irv_body_class ); ?>">
