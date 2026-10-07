# irv-site 0.12.1 — Quem somos

Como instalar: envie o conteúdo desta pasta para `wp-content/plugins/irv-site/`
(mantendo as subpastas) e confirme a substituição de `irv-site.php`,
`assets/css/irv.css` e `assets/js/irv.js`. Os demais arquivos do plugin não mudam.

## Arquivos
- `templates/about.php` (novo): template próprio da página Quem somos.
- `irv-site.php`: versão 0.12.1, carrega `about.php` na rota Quem somos e a newsletter
  volta para a página de onde foi enviada.
- `assets/css/irv.css`: regras antigas intactas + bloco novo no final ("v0.12").
- `assets/js/irv.js`: acrescenta espaço antes de `<br>` (corrige palavras coladas no celular, inclusive na home).
- `assets/partners/*.png` (novos): 12 logos recortados da imagem composta do Wix. São provisórios.

## Parceiros
Em `templates/about.php`, o array `$partners` lista nome e arquivo. Para trocar um logo,
envie o arquivo para `assets/partners/` com o mesmo nome. Para incluir outro parceiro,
acrescente uma linha: sem arquivo, a vaga aparece reservada (tracejada).

## 0.12.1
- Seção "13 títulos": faixa clara e compacta (antes era um bloco azul grande).
- Parceiros: logos em largura total (4 por linha), maiores e sem esmaecer; logos recortados com fundo limpo.
- Documentos: cards pequenos em linha (ícone, nome, ano e "Baixar").

## 0.13.0 — demais páginas internas
- Novos templates: `work.php` (O que fazemos), `join.php` (Faça parte), `news.php` (Notícias), `post.php` (notícia, agora com "Leia também") e `privacy.php`.
- `templates/partials/` (head, header, footer, newsletter): cabeçalho, rodapé e newsletter iguais aos da home, compartilhados por todas as páginas internas, com o item do menu da página atual destacado.
- `irv-site.php`: cada rota carrega o seu template; `page.php` deixou de ser usado (fica no plugin como reserva).
- CSS (bloco v0.13): números de impacto sem sobreposição, hero de O que fazemos com a arte pronta, fotos das notícias sem esticar, formulário de doação sem linha cortando os títulos, textos de notícia e privacidade alinhados à esquerda.
- O `post.php` antigo foi substituído; o `page.php` antigo continua no servidor.

## 0.14.0 — O que fazemos no estilo do Wix + movimento
- Hero com a arte dentro do limite de largura da home, pincel rosa no canto e faixa cinza de topo inclinado logo abaixo (as pernas da menina terminam na diagonal, como no Wix).
- Metodologia com o texto completo, "habilidades socioemocionais" em azul, palavras-chave em negrito e setinha desenhada.
- Pilares: card branco, foto com ícone redondo, botão "Saiba mais" que abre o texto longo (acordeão acessível, um aberto por vez).
- Impacto: cards 01–04 com a foto inteira (sem cortar as pernas). O bloco azul de números (188/300/350/2200) deixou de aparecer nesta página, pois não existe no Wix.
- Movimento (todas as páginas internas): entrada ao rolar em cascata, números que contam (Faça parte), hover nos cards. Desligado em "reduzir movimento" e sem JavaScript tudo continua visível.

## 0.14.2 — Participantes e Nosso impacto (O que fazemos)
- Participantes: cards de retrato com a frase sobre a foto e etiqueta de nome e idade; no celular viram carrossel de deslizar. Fotos otimizadas em WebP (`assets/voices/`, 25–58 KB em vez de 4–5 MB).
- Nosso impacto: lista no estilo do Wix (numeral azul em degradê, fio com ponto rosa, foto de corte inclinado em fundo cinza), com hover e entrada em cascata.
