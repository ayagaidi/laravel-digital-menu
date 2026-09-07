# Contributing

Thanks for considering a contribution to Laravel Digital Menu. The project is intentionally focused, so small, well-tested changes are preferred over large bundles of unrelated features.

## Development setup

```bash
git clone https://github.com/ayagaidi/laravel-digital-menu.git
cd laravel-digital-menu
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

## Branch naming

Use short, descriptive branch names:

- `feat/branch-price-editor`
- `fix/inactive-branch-access`
- `docs/setup-troubleshooting`
- `test/admin-authentication`
- `refactor/menu-query`

## Before opening a pull request

Run the project quality checks:

```bash
php artisan test
vendor/bin/pint --test
```

For database changes, create migrations instead of asking users to edit tables manually.

For public-facing behavior, update or add a Feature Test when practical.

## Pull request expectations

A good pull request should:

- solve one clear problem;
- explain the user or developer impact;
- include verification steps;
- keep backwards compatibility in mind;
- update documentation when behavior changes;
- avoid unnecessary dependency additions;
- pass CI before merge.

## Security and privacy

Never contribute:

- `.env` values;
- API tokens or private keys;
- SMTP or database credentials;
- customer or production data;
- proprietary client assets;
- code you are not authorized to publish.

If a change touches authentication, authorization, uploads, sessions, or data exposure, mention the security considerations in the pull request.

## Bilingual behavior

The public menu is intended to support Arabic and English. UI changes should consider both RTL and LTR layouts, and new user-visible strings should not make one language path unusable.

## Commit messages

Use concise, conventional-style messages when possible:

```text
feat: add branch-specific price editor
fix: hide inactive menu items
 test: cover disabled admin login
docs: improve installation guide
```

## Review philosophy

Reviews should focus on correctness, scope, maintainability, security, and user experience. Feedback is about the contribution, not the contributor.

By contributing, you agree to follow `CODE_OF_CONDUCT.md`.
