<?php

/**
 * @category  module
 * @package   kohana-doctrinemigrations
 * @author    synchrone, Oleg Abrazhaev <seyferseed@mail.ru>
 * @link      http://github.com/seyfer/kohana-doctrinemigrations
 */
return array(
    // location of the "Doctrine" directory
    'vendor_path'         => APPPATH . '../vendor/',
    'doctrine_path'       => APPPATH . '../vendor/doctrine/',
    'migrations_path'     => APPPATH . '../vendor/doctrine/migrations/',
    'extensions_path'     => APPPATH . '../vendor/gedmo/doctrine-extensions/lib/Gedmo/',
    // classloader config
    'entities_namespace'  => 'Entities',
    'entities_path'       => APPPATH . 'classes',
    'proxies_namespace'   => 'Proxies',
    'proxies_path'        => APPPATH . 'classes',
    // doctrine config
    'proxy_dir'           => APPPATH . 'classes/Doctrine/Proxies',
    'proxy_namespace'     => 'Proxies',
    'mappings_path'       => APPPATH . 'classes/Doctrine/Entity',
    'mappings_driver'     => 'yml',
    // mappings between Kohaha database types and Doctrine database drivers
    // @see http://kohanaframework.org/3.1/guide/database/config#connection-settings
    // @see http://www.doctrine-project.org/docs/dbal/2.0/en/reference/configuration.html#connection-details
    'type_driver_mapping' => array(
        'pdo'   => 'pdo',
        'mysql' => 'pdo_mysql',
        'PDO'   => 'pdo',
        'MySQL' => 'pdo_mysql'
    //'N/A' => 'pdo_pgsql',
    //'N/A' => 'pdo_sqlite',
    //'N/A' => 'pdo_oci',
    //'N/A' => 'oci8',
    ),
    'console_commands'    => array(),
    'console_helpers'     => array(),
    'configuration'       => APPPATH . 'config/doctrine.xml',
);
