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

## 0.14.3
- Nosso impacto: as quatro linhas têm sempre a mesma altura (a da maior), em qualquer tela.
- O que fazemos: o mesmo espaço (88 px no desktop, 64 no tablet, 52 no celular) em cima e embaixo de todas as seções.

## 0.14.4
- O que fazemos: removida a faixa "Fique por dentro" acima do rodapé (o Wix também não a tem nesta página) e a faixa de doação voltou a ser azul, com botão rosa.

## 0.14.5
- O que fazemos: espaço entre seções reduzido (56 px no desktop, 44 no tablet, 36 no celular), igual em todas. Ajuste pela variável `--sy` no CSS.

## 0.14.6
- O que fazemos: removida a pincelada rosa circular do canto do hero.

## 0.15.0 — Notícias modernas
- Página Notícias: cabeçalho centralizado ("Histórias em movimento"), filtros de categoria em pílulas centralizadas, a notícia mais recente em destaque (foto grande + resumo + botão) e os demais em cards com a foto ao fundo, etiquetas de categoria, data e "Ler matéria".
- Página de notícia: "Leia também" usa os mesmos cards.
- Fotos das notícias em WebP leve (`assets/news/`, 23–176 KB, antes até 7 MB). Funções de apoio em `templates/partials/news-helpers.php` (se a foto leve não existir, usa o original).

## 0.15.1
- Removido o "1 min de leitura" de todas as páginas (home, lista de notícias, destaque, cards, "Leia também" e página da notícia). `templates/home.php` agora também está no repositório.

## 0.15.2
- Home: o item "Notícias" do cabeçalho agora abre a página de notícias (antes rolava a página até a seção).

## 0.16.0 — Faça parte
- Hero em tela cheia com borda rasgada; "Existem muitas formas de *fazer parte*" com a letra manuscrita do Wix; 3 cartões com os ícones do Wix (doação, parcerias, materiais). O cartão "Seja voluntário" foi excluído.
- Doação interativa: frequência (1 vez/mensal), valores e "Outro"; o botão mostra "Doar R$ X" e abre um e-mail com o valor escolhido (o pagamento ainda não está conectado).
- Depoimentos: cards com pôster; tocam vídeo ao clicar quando o arquivo MP4 existir em `assets/videos/` (`depoimento-paulo.mp4`, `depoimento-ludmila.mp4`, `depoimento-clarissa.mp4`).
- Galeria em mosaico com visualizador de foto e vídeo (`assets/gallery/`, itens listados em `templates/join.php`).
- Entrada ao rolar, valores contando e hover nos cards.

## 0.16.1
- Faça parte: valores de doação em cards com o que cada um representa (R$ 30 sapatilha, R$ 50 luvas, R$ 70 uniforme, R$ 100 joelheiras, R$ 200 kit) e a opção "Gostaria de adicionar R$ … para cobrir taxas de transação" (marcada por padrão; 2,9% do valor, como no Wix). O botão mostra o total, ex.: "Doar R$ 51,45".

## 0.16.2
- Palavras em destaque (rosa) em Georgia itálico: "habilidades socioemocionais" (O que fazemos) e "fazer parte" (Faça parte, agora texto em vez de imagem). "Propósito" e "novos futuros." já eram. As regras precisam de `body.irv-site` porque `body.irv-site *` força a Red Hat Display em tudo.
- Números de impacto centralizados em cada coluna; cards de valores da doação mais compactos e de mesma altura por linha.
- O que fazemos: a faixa cinza cobre a base da foto e a diagonal corta as pernas da menina.

## 0.16.3
- Faça parte: o vídeo do depoimento toca dentro do próprio card, no lugar da foto, sem abrir janela (um vídeo por vez; ao terminar, volta a foto). Só ativa quando o MP4 existir em `assets/videos/`.

## 0.16.4
- Faça parte: o vídeo do depoimento abre dentro do próprio card; enquanto o MP4 nosso não existe em `assets/videos/`, toca a versão 720p (reserva 480p) direto do Wix.
- Números de impacto no estilo do Wix: fundo branco, números rosa grandes, divisórias e pincel rosa no canto.
- Galeria sem legendas visíveis (a descrição fica só como rótulo de acessibilidade).

## 0.17.0
- Notícia: página nova (trilha Notícias / categoria, título grande, capa em destaque, autor e data, texto de leitura confortável com abertura em destaque, barra de progresso, botões de compartilhar WhatsApp/Facebook/LinkedIn/copiar link, hashtags como etiquetas, anterior/próxima e "Leia também").
- Vídeos nas notícias (ordem conferida pela API do Wix): "Um time só vence…" (snapinsta, ao final do texto) e "Esporte Record" (após o 3º parágrafo, com botão para o R7). Tocam a versão 720p do Wix (reserva 480p) enquanto o MP4 nosso não existe em `assets/videos/` (`noticia-um-time-so-vence.mp4`, `noticia-esporte-record.mp4`).
- Menu e rodapé: "Home" virou "Início".
- Quem somos: pontos da linha do tempo centralizados nos cards (2022 marca o começo).
- Home: imagens abaixo da dobra com carregamento preguiçoso, entrada suave ao rolar e números do topo que contam (respeita "reduzir movimento").
- Removida a pincelada rosa da seção de números (Faça parte).

## 0.17.1
- Home: o card "Doe para o IRV" ganhou um brilho que atravessa o card a cada poucos segundos, um halo respirando no canto e o botão "Doe agora" pulsando; sobe levemente ao passar o mouse. Desligado em "reduzir movimento".

## 0.18.0 — Home
- Imagens: versões menores em AVIF (`hero-1280/800`, `about-480`, `news-N-480`) com `srcset`/`sizes`, imagem principal menor em telas menores (CSS) e `width`/`height` nas imagens (sem saltos de layout). `news-3.avif` reduzida de 170 KB para 41 KB (a original ficou no servidor como `news-3.avif.bak-0.17`).
- Espaço entre seções padronizado (56 px desktop, 44 tablet, 36 celular), como nas outras páginas (`--sy`).
- Botões "Conheça o instituto" e "Apoie o IRV" levam às páginas Quem somos e Faça parte; o menu do rodapé da home também leva às páginas.

## 0.19.0
WhatsApp flutuante no mobile: ao rolar até o rodapé, para acima da linha dos créditos (JS `--wa-lift` + CSS).
