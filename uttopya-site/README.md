# uttopya.com.br — página inicial estática

Substitui a página inicial em WordPress. São só arquivos estáticos, sem PHP nem banco.

- `index.html`: logo, três ícones (Instagram, LinkedIn, e-mail) e fundo `#faf8f4`.
- `assets/logo.svg`: logo vetorizado a partir de uma captura da página antiga. Se tiver o SVG original, substitua este arquivo (mesmo nome).
- `.htaccess`: faz o `index.html` abrir na raiz. O `/irv` é um redirecionamento do painel da Hostinger (https://uttopya.com.br/irv → site do Instituto) e não depende do WordPress.

## Estado atual (publicado em 18/10/2026)
Hospedagem: Hostinger, usuário `u887555276`, raiz `/home/u887555276/domains/uttopya.com.br/public_html`.
- Enviados: `index.html` e `assets/logo.svg`.
- `.htaccess` da raiz: ganhou só a linha `DirectoryIndex index.html index.php`. O resto (blocos LiteSpeed e WordPress) segue igual. Cópia do original em `.htaccess.pre-static`.
- O WordPress ainda está no servidor, e `/manifesto/` ainda funciona por ele.
- Se a página antiga continuar aparecendo, limpe o cache do LiteSpeed em hPanel → Avançado → Gerenciador de cache → Limpar tudo.

## Remover o WordPress (ainda não feito)
Não há como apagar arquivos soltos pela API da Hostinger, e a única operação de exclusão (`hosting_websites_delete`) apaga o site inteiro, com `abraccine`, `app` e `apps`. **Nunca use essa operação.** Apague pelo Gerenciador de Arquivos do hPanel.

Antes: backup completo (arquivos e banco) e decidir o destino de `/manifesto/`.
Pode sair da raiz: `wp-admin/`, `wp-includes/`, `wp-content/`, `wp-*.php`, `xmlrpc.php`, `license.txt`, `readme.html`, `index.php`, `robots.txt` e `llms.txt` (gerados pelo plugin de SEO, com sitemaps que deixam de existir), `mo.zip`, `.htaccess.bk` e o banco do WordPress. No `.htaccess`, remova os blocos LSCACHE, NON_LSCACHE e WordPress.
Não mexer: `abraccine/`, `app/`, `apps/`, `assets/`, `index.html`. A pasta `novo/` é outra instalação do WordPress, que não é desta página.
