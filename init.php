<?php

/**
 * @category  module
 * @package   kohana-doctrinemigrations
 * @author    synchrone, Oleg Abrazhaev <seyferseed@mail.ru>
 * @link      http://github.com/seyfer/kohana-doctrinemigrations
 */
defined('SYSPATH') or die('No direct script access.');

$modules = Kohana::modules();

$doctrine_config = Kohana::$config->load('doctrine');

require_once $doctrine_config['vendor_path'] . '/autoload.php';

use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader('Doctrine\DBAL\Migrations', $doctrine_config['migrations_path'] . 'lib');
$classLoader->register();

$doctrine_cfg = Kohana::$config->load('doctrine');

$doctrine_cfg->set('console_commands', array_merge($doctrine_cfg->get('console_commands', array()), array(
    // Migrations Commands
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()
                )
        )
);

$doctrine_cfg->set('console_helpers', array_merge($doctrine_cfg->get('console_helpers', array()), array(
    'dialog' => new \Symfony\Component\Console\Helper\QuestionHelper(),
                )
        )
);
