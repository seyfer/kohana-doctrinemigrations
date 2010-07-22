# Doctrine Migrations

*Doctrine Migrations module for Kohana 3.x*

- **Module Versions:** 0.8
- **Module URL:** <http://github.com/synapsestudios/kohana-doctrinemigrations>
- **Compatible Kohana Version(s):** 3.0

## Description

This module allows for managing database migrations between multiple environments easily by
utilizing the Doctrine migrations library.

## Requirements & Installation

**You should make sure to disable this module on your production environment!**

The Doctrine Migrations module is tested with Doctrine v1.2.2. You should run
`git submodule update --init` to load Doctrine into the vendor directory of this module.
Additionally, you should create a directory for your migration classes that is located in your
application directory (application/migrations/).

To run from the command line, execute this command from the directory that has your index.php file:
`php index.php --uri=migrate`.  This will run all database migrations up to the
current version. You can optionally include the version that you want to migrate up/down to like so:
`php index.php --uri=migrate/14`.

You can additionally execute: `php index.php --uri=migrate/current` to return the current
migrations version.

Additional information about how to create migration classes can be found at
<http://www.doctrine-project.org/documentation/manual/1_2/en/migrations#writing-migration-classes>
