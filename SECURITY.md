# Security Policy

Security reports are taken seriously. Please avoid exposing vulnerabilities, credentials, production data, or customer information in public issues.

## Supported version

The latest code on `main` is the actively maintained version of this open-source starter.

## Reporting a vulnerability

Do **not** open a public issue for a vulnerability that could expose accounts, credentials, sessions, files, or data.

Report the concern privately to the repository maintainer using an appropriate private contact method available on the maintainer's GitHub profile. Include:

- a concise description of the issue;
- affected route, component, or workflow;
- reproduction steps;
- impact assessment;
- suggested mitigation, if known.

Do not include real customer data or live credentials in the report.

## Secrets and sensitive data

Never commit or post:

- `.env` files or environment values;
- application keys;
- database passwords;
- SMTP credentials;
- API tokens;
- private keys or certificates;
- production database exports;
- customer information;
- proprietary client assets.

If a secret is committed accidentally, removing it in a later commit is not enough. Rotate or revoke the credential and clean repository history when appropriate.

## Production checklist

Before deploying a derivative project to production:

- set `APP_ENV=production`;
- set `APP_DEBUG=false`;
- use a unique `APP_KEY`;
- use least-privilege database credentials;
- serve the application over HTTPS;
- validate and constrain uploaded files;
- protect admin routes with appropriate authorization;
- rotate all demo or temporary credentials;
- keep dependencies patched;
- maintain tested backups.

## Demo admin

This repository does not ship with a committed demo password. A demo admin is only created when `SEED_ADMIN_PASSWORD` is explicitly configured in the environment.

## Dependency security

Contributors should avoid adding unnecessary packages. Security-related dependency updates should be tested and documented when they materially change application behavior.
