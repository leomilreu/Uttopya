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

## WordPress removido (18/10/2026)
Objetivo: reduzir ao máximo os inodes da página. A raiz de `public_html` agora tem só:
`index.html`, `assets/`, `.htaccess` (apenas `DirectoryIndex index.html`) e as pastas de outros projetos, `abraccine/`, `app/` e `apps/`, que não devem ser alteradas.

Removidos: o WordPress da raiz (feito no hPanel), a pasta `novo/` (outra instalação do WordPress), `llms.txt`, `readme.html`, `.htaccess.pre-static` e `.tmb/`. `/manifesto/` saiu do ar junto com o WordPress, por decisão do dono.
O `/irv` continua sendo um redirecionamento do painel da Hostinger e não depende de arquivos.

Observações sobre a API da Hostinger:
- Não há operação de apagar arquivos. `hosting_websites_delete` **apaga o site inteiro, com `abraccine`, `app` e `apps`. Nunca use.**
- `wordpress_installations_delete` só desregistra a instalação e não apaga arquivos.
- O painel pode continuar listando instalações antigas do WordPress (registro defasado). Elas somem após nova detecção ou ao apagar o banco.

Pendente (decisão do dono):
- Banco `u887555276_0XlC7` (46 MB, de 03/11/2023, ligado a uttopya.com.br): provavelmente o do WordPress da raiz. Confirmar antes de excluir.
- Banco `u887555276_ybZP0` (criado em 18/10/2026, 22:32 UTC, ligado a uttopya.com.br): origem desconhecida. Não excluir sem confirmar.
- `apps/solaris/` tem dezenas de versões antigas de `ncr-native.v1.*.js` e `tipografia.v1.*.js`. Conferir qual versão o `index.html` usa antes de apagar.
