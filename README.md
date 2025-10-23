# WordPress Plugin/Theme Testing Platform

This repository provides an independent testing and linting framework for WordPress plugins and themes. It is designed to run outside of your main WordPress site, allowing developers to test code in isolation using PHPUnit and Pest, and to enforce coding standards with PHP_CodeSniffer (PHPCS).

Linting is available for all PHP code in the `src/` directory, ensuring your code meets modern PHP and WordPress standards before deployment.

---

## WordPress Test Environment Setup

This framework includes an automated setup for the WordPress test environment. The script `composer run install-wp-tests` will:
- Download and install the specified version of WordPress core into `.wp-tests/wordpress`.
- Download the WordPress test suite into `.wp-tests/wp-tests-lib`.
- Create and configure the test database and user (using credentials from `.env.testing` or environment variables).
- Generate a `wp-tests-config.php` file for the test suite.

**To set up the test environment:**

```bash
composer run install-wp-tests
```

You can customize database credentials and WordPress version by editing `.env.testing` or passing environment variables. See the script and comments for advanced options.

---

## A NOTE about PHPUnit Version Compatibility

**Why PHPUnit 9.6?**

This project uses **PHPUnit 9.6** because it is the latest version fully compatible with the official WordPress test suite (`wp-phpunit/wp-phpunit`).

PHPUnit 10 and above introduce breaking changes and remove legacy features that WordPress and many plugins rely on, making them unsuitable for WordPress plugin testing at this time.

For maximum compatibility and stability with WordPress testing tools, we recommend using PHPUnit 9.6.

---

## WordPress Plugin Test Setup

This repo includes a ready-to-go WordPress plugin testing framework using PHPUnit 9.6 and Pest.

### Test Helpers
- `tests/phpunit/helpers.php`: Contains reusable helper functions and simple mocks for your tests.

### Sample Tests
- `tests/phpunit/ExampleTest.php`: Includes basic Pest tests and examples of using custom helpers and mocks.

### Bootstrap
- `tests/bootstrap.php`: Loads environment variables, sets up WordPress test suite paths, and preloads helpers. Automatically activates your theme and registers test hooks.

### WordPress Test Config
- `tests/wp-tests-config.php`: Configuration for the WordPress test environment (DB credentials, paths, etc). Adjust as needed for your local setup.

### Running Tests

```bash
composer install
vendor/bin/pest
```

### Notes
- All tests are compatible with WordPress’s official test suite.
- Use `helpers.php` for custom assertions and mocks.
- For integration with WordPress, ensure your `.env.testing` and `wp-tests-config.php` are set up correctly.

For more details, see the comments in each file.

## Installing PHPUnit 9.6

To install PHPUnit 9.6, you can use Composer. Run the following command in your project directory:

```bash
composer require --dev phpunit/phpunit:^9.6
```

## Running Tests

Once PHPUnit 9.6 is installed, you can run your tests using the following command:

```bash
./vendor/bin/phpunit
```

## Updating PHPUnit

To update PHPUnit to the latest 9.6.x version, run the following command:

```bash
composer update phpunit/phpunit
```

## Code Linting with PHPCS

This project uses PHP_CodeSniffer (PHPCS) with a custom ruleset (`phpcs.xml.dist`) to enforce modern PHP and WordPress coding standards.

- Linting is run against the `src/` directory, which contains example classes like `DummyClass.php`.
- The ruleset combines PSR-12, WordPress documentation, security, and naming conventions, with exclusions for conflicting rules.
- Snake_case method names are allowed for WordPress compatibility.

### Running Lint

Run the following command to check code style:

```bash
composer run php:lint
```

To automatically fix fixable issues:

```bash
composer run php:fix
```

For a detailed lint report:

```bash
composer run php:lint-report
```

See `phpcs.xml.dist` for the full configuration and adjust as needed for your project.

## Additional Resources

- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [WordPress Plugin Development Handbook](https://developer.wordpress.org/plugins/)
- [Pest PHP Documentation](https://pestphp.com/docs/introduction)