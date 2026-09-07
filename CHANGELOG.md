# Changelog

All notable changes to Laravel Digital Menu are documented here.

The project follows a simple release-oriented changelog so users can quickly understand what changed between versions.

## [1.0.0] - 2026-09-07

### Added

- Laravel 12 / PHP 8.2+ application foundation
- bilingual Arabic and English menu content
- RTL / LTR-ready views
- multi-branch restaurant structure
- categories and menu items
- branch-specific item availability
- branch-level price override support in the data model
- QR route per branch
- session-based admin authentication
- admin CRUD for branches, categories, and menu items
- safe environment-driven demo admin seeding
- SQLite-friendly local development setup
- Feature Tests for public menu behavior, locale switching, authentication, and branch availability rules
- GitHub Actions quality workflow
- Laravel Pint code-style gate
- architecture, contribution, security, and support documentation

### Security

- no committed demo password
- `.env` remains ignored
- demo credentials are supplied only through environment variables

## Release notes policy

Future entries should focus on user-visible behavior, developer-facing changes, migrations, breaking changes, and security-relevant updates.
