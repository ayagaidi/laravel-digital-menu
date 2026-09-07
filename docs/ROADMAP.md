# Roadmap

Laravel Digital Menu is intentionally small and focused. The roadmap prioritizes features that make the starter more useful for real cafés and restaurants without turning it into a heavy SaaS platform.

## Current foundation

- [x] Laravel 12 application structure
- [x] PHP 8.2+ support
- [x] Arabic / English content
- [x] RTL / LTR-ready views
- [x] multiple branches
- [x] categories and menu items
- [x] branch-specific item availability
- [x] branch price override support in the data model
- [x] QR route per branch
- [x] admin authentication
- [x] admin CRUD for branches, categories, and menu items
- [x] safe environment-based demo admin seeding
- [x] Feature Tests
- [x] GitHub Actions quality checks
- [x] Laravel Pint formatting gate

## Next

### 1. Media and branding

- [ ] validated menu-item image uploads
- [ ] reusable image storage service
- [ ] restaurant logo and brand settings
- [ ] theme/custom accent configuration

### 2. Admin and permissions

- [ ] role-based authorization policies
- [ ] user management
- [ ] branch-scoped admin access
- [ ] safer destructive-action confirmations

### 3. Branch commerce rules

- [ ] edit branch-specific price overrides from the admin UI
- [ ] scheduled item availability
- [ ] sold-out / temporarily unavailable state

### 4. Developer experience

- [ ] static analysis
- [ ] broader Feature Test coverage
- [ ] reusable factories for domain models
- [ ] Docker-based development option
- [ ] installation health-check command

### 5. Integrations

- [ ] optional read-only API endpoints
- [ ] cache strategy for high-traffic public menus
- [ ] export/import format for menu content

## Non-goals

The core project does not aim to become a payment processor, POS system, delivery marketplace, or proprietary hosted platform. Integrations for those use cases can live as optional extensions.

## Contributing to the roadmap

Open a feature request describing the user problem first. Small, focused changes with tests are preferred over large bundles of unrelated functionality.
