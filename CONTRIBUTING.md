# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/yajra/laravel-address).

## Pull Requests

- **Add tests!** — Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** — Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** — We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** — Don't ask us to pull from your master branch.

- **One pull request per feature** — If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** — Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Commit Convention

This project enforces [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/).

```
<type>: <description>

feat: add address correspondence code
fix: missing province of HUC cities
chore: update PSGC publication to 1Q-2026
docs: update README installation steps
```

Allowed types: `feat`, `fix`, `chore`, `docs`, `style`, `refactor`, `perf`, `test`, `ci`.

## Coding Standards

- **[PSR-12](https://www.php-fig.org/psr/psr-12/)** — We use [Laravel Pint](https://github.com/laravel/pint) with the `laravel` preset to enforce coding standards.
- **Type declarations** — All new code must use strict type declarations where applicable.

## Static Analysis

We use [PHPStan](https://phpstan.org/) at the maximum level. Run the analysis before submitting:

```bash
composer stan
```

## Running Tests

```bash
composer test
```

## Pre-submit Check

Run the full PR pipeline locally before submitting:

```bash
composer pr
```

This will run rector, pint, phpstan, and tests in sequence.

**Happy coding!**
