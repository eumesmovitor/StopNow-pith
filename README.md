# STOPNOW — MVC (PHP + MySQL)

Este projeto foi organizado em **MVC**:
- **Models**: acesso ao banco (PDO).
- **Views**: páginas PHP com layout (header/footer).
- **Controllers**: regras e navegação.
- **Core**: `Router`, `Controller`, `Database`.
- **public/**: *front controller* (`index.php`), `.htaccess` e assets.

## Rodando
1. Importe `database/stopnow.sql` (ou `install.sql` que você já tinha).
2. Configure `config/config.php` (ou use variáveis de ambiente `DB_*`).
3. Publicar a pasta `public/` no Apache (XAMPP/WAMP). Acesse `http://localhost/`.

Rotas principais:
- `/` — Home
- `/auth/login`, `/auth/register`, `/auth/logout`
- `/vagas`, `/vagas/create`, `/vagas/store` (POST), `/vagas/reservar` (POST)

## Dica
- Seus CSS foram copiados para `public/assets/css/`. Ajuste/importe outros CSS conforme desejar nas Views.
