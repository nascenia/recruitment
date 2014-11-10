Nascenia Recruitment Tool
=========================

## Cache

**Always** remember to clear your cache by running `bin/console r:c`.

## How to deploy

1. Pull down the code and point apache to `<project-root>/public/`.
2. Give write permissions to `<project-root>/data/`.
3. Run `composer install` to install dependencies.
4. Configure database information in `local.config.php` (see below).
5. Run `bin/console d:s:u NasRec -f` to generate the database schema.
6. View your site in the browser!

## Sample `local.config.php`

Rename `<project-root>/config/autoload/local.config.php.sample` to `local.config.php` and replace all blank placeholders with their actual values.

## Application environment

The `APP_ENV` constant defines the application environment. This can be either `prod` or `dev` (see `BetterCollective\Zend\Mvc\Application`).

The value is retrieved from the `$_SERVER['APP_ENV']` variable. You can also locally change the environment by using the `data/env.meta` file.

In production zend configuration and all doctrine entities are cached to the filesystem under `data/cache/`. Doctrine also doesn't generate the proxies in production. So you must generate the proxies using `bin/console d:p:g` and track them in git.
