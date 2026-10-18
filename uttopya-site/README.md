# uttopya.com.br — página inicial estática

Substitui a página inicial em WordPress. São só arquivos estáticos, sem PHP nem banco.

- `index.html`: logo, três ícones (Instagram, LinkedIn, e-mail) e fundo `#faf8f4`.
- `assets/logo.svg`: logo vetorizado a partir de uma captura da página antiga. Se tiver o SVG original, substitua este arquivo (mesmo nome).
- `.htaccess`: redireciona `/irv` para o site do Instituto no Hostinger.

## Publicar
1. Faça backup completo do site atual (arquivos e banco) antes de qualquer remoção.
2. Envie o conteúdo desta pasta para a raiz do site.
3. **Não sobrescreva o `.htaccess` existente sem olhar.** O do WordPress pode conter regras para `/abraccine`, `/app` e `/apps`. Junte as regras e remova apenas o bloco `# BEGIN WordPress ... # END WordPress`.

## Remover o WordPress (só depois de conferir `/abraccine`, `/app` e `/apps`)
Não toque nas pastas `abraccine`, `app` e `apps`. Primeiro confirme que nenhuma delas usa o WordPress (banco, `wp-load.php`, rewrite).

Pode sair da raiz, apenas depois dessa conferência: `wp-admin/`, `wp-includes/`, `wp-content/`, `wp-*.php`, `xmlrpc.php`, `license.txt`, `readme.html`, `index.php`, `.htaccess` antigo (regras do WP) e o banco de dados do WordPress.
Remova também o plugin Jetpack e a conexão do site com o WordPress.com.
