<p align="center">
  <img src="docs/assets/hero.svg" alt="Laravel Digital Menu" width="100%">
</p>

<p align="center">
  <a href="https://github.com/ayagaidi/laravel-digital-menu/actions/workflows/tests.yml"><img alt="Laravel Quality" src="https://github.com/ayagaidi/laravel-digital-menu/actions/workflows/tests.yml/badge.svg"></a>
  <a href="https://github.com/ayagaidi/laravel-digital-menu/blob/main/LICENSE"><img alt="MIT License" src="https://img.shields.io/github/license/ayagaidi/laravel-digital-menu"></a>
  <img alt="PHP 8.2+" src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white">
  <img alt="Laravel 12" src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white">
  <a href="https://github.com/ayagaidi/laravel-digital-menu/stargazers"><img alt="GitHub stars" src="https://img.shields.io/github/stars/ayagaidi/laravel-digital-menu?style=flat"></a>
</p>

<p align="center">
  <strong>A bilingual, multi-branch QR menu starter for cafés and restaurants.</strong><br>
  Laravel 12 · Arabic / English · RTL / LTR · Admin CRUD · Feature Tests · CI
</p>

<p align="center">
  <a href="README_AR.md">العربية</a> ·
  <a href="docs/ARCHITECTURE.md">Architecture</a> ·
  <a href="docs/ROADMAP.md">Roadmap</a> ·
  <a href="CONTRIBUTING.md">Contributing</a> ·
  <a href="SECURITY.md">Security</a> ·
  <a href="SUPPORT.md">Support</a>
</p>

---

## What is Laravel Digital Menu?

Laravel Digital Menu is an open-source starter for restaurants and cafés that need a clean QR-based menu without depending on a large hosted platform.

It provides a practical Laravel foundation for **multiple branches**, **Arabic and English content**, **branch-level menu availability**, **QR entry points**, and an authenticated admin area for managing the core menu structure.

The repository is intentionally independent: it contains **no client credentials, private branding, proprietary assets, or production data**.

## Screenshots

The screenshots below are rendered from the project's current Blade views using the public demo data shipped by the repository.

### Public landing page

<p align="center">
  <img src="docs/screenshots/home.jpg" alt="Laravel Digital Menu public landing page" width="100%">
</p>

### Branch menu

<p align="center">
  <img src="docs/screenshots/menu.jpg" alt="Laravel Digital Menu branch menu" width="100%">
</p>

### Admin dashboard

<p align="center">
  <img src="docs/screenshots/admin-dashboard.jpg" alt="Laravel Digital Menu admin dashboard" width="100%">
</p>

## Highlights

| Area | Included |
| --- | --- |
| Framework | Laravel 12 / PHP 8.2+ |
| Languages | Arabic + English |
| Layout direction | RTL + LTR ready |
| Branches | Multiple restaurant branches |
| Menu structure | Categories + menu items |
| Branch rules | Availability + price override support |
| QR | Branch-specific QR route |
| Admin | Authentication + CRUD workflows |
| Database | SQLite-friendly local setup |
| Quality | PHPUnit Feature Tests + Laravel Pint |
| Automation | GitHub Actions CI |
| License | MIT |

## Core domain

```text
Restaurant
 └── Branch
      ├── Category
      │    └── MenuItem
      └── branch_menu_item
           ├── is_available
           └── price_override
```

The `branch_menu_item` pivot keeps branch-specific commercial rules separate from the base menu item, so the same item can be reused across locations with different availability or pricing.

## Quick start

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

Open:

```text
http://127.0.0.1:8000
```

### Demo admin

A password is never committed to the repository. To create a local demo admin, set your own values in `.env`:

```dotenv
SEED_ADMIN_NAME="Demo Admin"
SEED_ADMIN_EMAIL=admin@example.test
SEED_ADMIN_PASSWORD=change-this-locally
```

Then run:

```bash
php artisan db:seed
```

## Quality gate

Every push and pull request to `main` runs the project quality workflow:

```bash
php artisan test
vendor/bin/pint --test
```

The current Feature Test suite covers:

- public menu rendering;
- locale persistence;
- admin authentication;
- disabled admin rejection;
- branch-specific availability;
- inactive branch behavior.

CI is intentionally strict: code should be both behaviorally tested and Laravel Pint compliant before merge.

## Architecture

This is a server-rendered Laravel application with two primary surfaces:

1. a public bilingual digital menu;
2. an authenticated administration area.

For relationships, request flow, data lifecycle, and architectural notes, see **[docs/ARCHITECTURE.md](docs/ARCHITECTURE.md)**.

## Project status

**v1.0.0** is the first stable open-source foundation: domain model, admin CRUD, bilingual public flow, branch rules, automated tests, CI, and public project documentation.

Next priorities include validated image uploads, branding controls, authorization policies, branch-specific price editing, broader test coverage, and optional API support.

See the full **[public roadmap](docs/ROADMAP.md)**, **[changelog](CHANGELOG.md)**, and **[v1.0.0 release notes](docs/releases/v1.0.0.md)**.

## Community

Contributions are welcome when they keep the project focused, secure, and reusable.

- Found a reproducible problem? Open a **bug report**.
- Have an idea that fits the project scope? Open a **feature request**.
- Want to contribute code? Read **[CONTRIBUTING.md](CONTRIBUTING.md)** first.
- Need help using the project? See **[SUPPORT.md](SUPPORT.md)**.
- Found a vulnerability? Follow **[SECURITY.md](SECURITY.md)** and do not publish sensitive details in a public issue.

Please follow the **[Code of Conduct](CODE_OF_CONDUCT.md)** when participating.

## Why this project stays focused

The goal is to provide a clean digital-menu foundation, not to become a payment processor, delivery marketplace, POS platform, or proprietary SaaS product. Keeping the core small makes it easier to understand, extend, test, and deploy.

## Author

Maintained by **Aya Aljaidi** — Laravel / Full-Stack Developer, Tripoli, Libya.

GitHub: [@ayagaidi](https://github.com/ayagaidi)

## License

Laravel Digital Menu is open source software licensed under the **[MIT License](LICENSE)**.

If this project is useful to you, consider giving it a ⭐ — it helps more developers discover the project.
