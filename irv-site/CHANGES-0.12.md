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
