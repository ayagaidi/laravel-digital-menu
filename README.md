# Laravel Digital Menu

[![Laravel Tests](https://github.com/ayagaidi/laravel-digital-menu/actions/workflows/tests.yml/badge.svg)](https://github.com/ayagaidi/laravel-digital-menu/actions/workflows/tests.yml)

An open-source **bilingual digital menu starter** for cafés and restaurants, built with Laravel 12 by **Aya Aljaidi**.

> This repository is an independent open-source demo. It contains no client credentials, proprietary assets, production data, or private project branding.

[العربية](README_AR.md) · [Architecture](docs/ARCHITECTURE.md) · [Security](SECURITY.md) · [Contributing](CONTRIBUTING.md)

## Why this project

Many cafés and restaurants need a simple QR menu that supports multiple branches, Arabic/English content, and an admin dashboard without depending on a heavy SaaS platform. This starter demonstrates how to build that cleanly in Laravel.

## Features

- Laravel 12 / PHP 8.2+
- Arabic + English with RTL/LTR-ready views
- Multiple restaurant branches
- Branch-specific menu availability
- Optional branch price overrides at the data-model level
- Categories and menu items
- QR code route per branch
- Session-based admin authentication
- Admin CRUD for branches, categories, and menu items
- Safe environment-based demo admin creation
- SQLite-friendly local setup
- PHPUnit Feature Tests
- GitHub Actions CI
- MIT license

## Domain model

```text
Restaurant
 └── Branch
      ├── Category
      │    └── MenuItem
      └── branch_menu_item
           ├── is_available
           └── price_override
```

## Quick start

```bash
git clone https://github.com/ayagaidi/laravel-digital-menu.git
cd laravel-digital-menu
composer install
cp .env.example .env
php artisan key:generate
```

The default example uses SQLite:

```bash
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`.

### Demo admin

No password is committed to the repository. Add your own local demo password to `.env`:

```dotenv
SEED_ADMIN_NAME="Demo Admin"
SEED_ADMIN_EMAIL=admin@example.test
SEED_ADMIN_PASSWORD=change-this-locally
```

Then run:

```bash
php artisan db:seed
```

## Tests

```bash
php artisan test
```

The initial Feature Test suite covers public rendering, locale switching, admin authentication, branch availability, and inactive-branch behavior.

## Portfolio highlights

This repository demonstrates Laravel architecture, Eloquent relationships, route-model binding, authentication, bilingual UX, many-to-many pivot business rules, database migrations/seeding, automated testing, and CI/CD fundamentals.

## Roadmap

- image uploads with storage validation
- branding settings and theme customization
- user/role management
- branch-specific price editing in the admin UI
- API endpoints for mobile clients
- Docker development environment
- richer test coverage and static analysis

## Security

Never commit `.env`, production database exports, customer information, API keys, SMTP passwords, or private assets. Demo credentials are supplied only through environment variables.

## Contributing

Issues and pull requests are welcome. Keep contributions focused, tested, and free of proprietary/client material.

## Author

**Aya Aljaidi** — Laravel / Full-Stack Developer, Tripoli, Libya  
GitHub: [@ayagaidi](https://github.com/ayagaidi)

## License

MIT
