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

## Remover o WordPress e liberar inodes (pendente, manual)
Objetivo: reduzir ao máximo os inodes. Decisões do dono: `/manifesto/` pode sair; a pasta `novo/` (outra instalação do WordPress) pode ser apagada.

O que a API da Hostinger permite e não permite:
- Não existe operação para apagar arquivos. A única que apaga arquivos de verdade, `hosting_websites_delete`, **apaga o site inteiro, com `abraccine`, `app` e `apps`. Nunca use.**
- `wordpress_installations_delete` só desregistrou a instalação de `novo` (18/10/2026). Os arquivos continuaram no servidor. Por isso ela não libera inodes e **não foi usada na instalação da raiz** (também apagaria o banco, sem ganho de inodes).

Apague pelo Gerenciador de Arquivos do hPanel (Websites → Gerenciador de arquivos → `public_html`), depois de um backup (arquivos e banco):
- Pastas: `wp-admin/`, `wp-includes/`, `wp-content/`, `novo/`, `.tmb/`
- Arquivos: `wp-*.php`, `xmlrpc.php`, `license.txt`, `readme.html`, `index.php`, `robots.txt`, `llms.txt`, `mo.zip`, `.htaccess.bk`, `.htaccess.pre-static`
- `.htaccess`: deixe só `DirectoryIndex index.html`.
- Banco de dados do WordPress (hPanel → Bancos de dados), por último.

Não mexer: `abraccine/`, `app/`, `apps/`, `assets/`, `index.html`, `.htaccess`.
Observação: `apps/solaris/` tem dezenas de versões antigas de `ncr-native.v1.*.js` e `tipografia.v1.*.js`, que são inodes que podem sair. Conferir antes qual versão a `index.html` usa.
