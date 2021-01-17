# CodeIgniter 4 Application Template

This repository includes:

- CodeIgniter 4.0.5-dev
- PHPUnit 9.5.0
- [Liaison Revision](https://github.com/paulbalandan/liaison-revision) 1.x-dev
- [bear/qatools](https://github.com/bearsunday/BEAR.QATools) 1.9.12

## How to Update

```
$ composer update
$ php spark revision:update
```

## Available Commands

```
composer test              // Run PHPUnit
composer cs-fix            // Fix the coding style
composer cs                // Check the coding style
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

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
