# CodeIgniter 4 Application Template

This repository includes:

- CodeIgniter 4.1.2-dev
  - [Translations for CodeIgniter 4 System Messages](https://github.com/codeigniter4/translations) dev-develop
- PHPUnit 9.5.1
- [Liaison Revision](https://github.com/paulbalandan/liaison-revision) 1.x-dev
- [bear/qatools](https://github.com/bearsunday/BEAR.QATools) 1.9.12

## Requirements

- PHP 7.3 or later
  - [intl](http://php.net/manual/en/intl.requirements.php)
  - [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
  - json (enabled by default - don't turn it off)
  - [mbstring](http://php.net/manual/en/mbstring.installation.php)
  - [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
  - xml (enabled by default - don't turn it off)

## How to Install

```
$ git clone https://github.com/kenjis/ci4-app-template.git your-project
$ cd your-project/
$ composer install
$ git checkout -b main
```

## How to Update

```
$ composer update
```

## Changes from the CI4 Default Configuration

- CSRF filter is enabled. [app/Config/Filters.php](https://github.com/kenjis/ci4-app-template/blob/ci4-app-template/app/Config/Filters.php#L32).
- Auto-Discovery of services is disabled. [app/Config/Modules.php](https://github.com/kenjis/ci4-app-template/blob/ci4-app-template/app/Config/Modules.php#L51).
- `Config\Services` extends `CodeIgniter\Config\Services`. [app/Config/Services.php](https://github.com/kenjis/ci4-app-template/blob/ci4-app-template/app/Config/Services.php).

## Available Commands

```
composer test              // Run PHPUnit
composer cs-fix            // Fix the coding style
composer cs                // Check the coding style
composer sa                // Run static analysis
composer run-script --list // List all commands
```

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the 
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/). 
