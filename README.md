# Doctrine Migrations

*Doctrine Migrations module for Kohana 3.x*
- **Module URL:** <http://github.com/synchrone/kohana-doctrinemigrations>
- **Compatible Kohana Version(s):** 3.2

## Usage

Require kohana-doctrine installed.

Copy doctrine.php and migrations.xml to application/config.

```
php vendor/kohana/modules/doctrine/bin/doctrine migrations:diff --configuration=application/config/migrations.xml
php vendor/kohana/modules/doctrine/bin/doctrine migrations:status --configuration=application/config/migrations.xml
```

## Description

This module allows for managing database migrations between multiple environments easily by
utilizing the Doctrine migrations library.

## Requirements & Installation

The Doctrine Migrations module is tested with Doctrine v2.0.6. You should run
`git submodule update --init` to load Doctrine into the vendor directory of this module.
Additionally, you should create a doctrine config file and specify it's path in your
`config/doctrine.php` file under `configuration` key

To run from the command line, you will need kohana-doctrine module available at
<http://github.com/synchrone/kohana-doctrine>
Remember to add this module after kohana-doctrine in the bootstrap.php
After that you will be able to run `./modules/kohana-doctrine/bin/doctrine` or copy it to your application root

Additional information about how to create migration classes can be found at
<http://www.doctrine-project.org/projects/migrations/2.0/docs/reference/en>
