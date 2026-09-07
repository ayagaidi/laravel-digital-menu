# Architecture

## Request flow

Public traffic is handled by `PublicMenuController`. It resolves the current restaurant, language, branch and branch-visible menu items, then renders Blade views. Administrative traffic is protected by session authentication and handled by focused resource controllers.

## Main relationships

- `Restaurant hasMany Branch`
- `Branch hasMany Category`
- `Category hasMany MenuItem`
- `Branch belongsToMany MenuItem` through `branch_menu_item`
- The pivot stores branch availability and an optional price override.

## Localization approach

Business content is stored in paired Arabic/English fields. The public locale is resolved from query/session/default restaurant locale. Blade uses `dir=rtl` for Arabic and `dir=ltr` for English.

## Security boundaries

- Admin routes require authentication.
- Demo admin credentials come only from environment variables.
- `.env` and runtime storage are excluded from Git.
- No client data or proprietary assets belong in this repository.

## Test strategy

Feature tests use an in-memory SQLite database and cover public rendering, locale persistence, authentication, pivot availability rules and inactive branch behavior. GitHub Actions runs tests on pushes and pull requests to `main`.
