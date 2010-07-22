<?php defined('SYSPATH') or die('No direct script access.');

Route::set('doctrine', 'migrate(/<version>)', array('version' => '\d+'))
	->defaults(array(
		'controller' => 'migrations',
		'directory'  => 'doctrine',
	));

Route::set('doctrine/current', 'migrate/current')
	->defaults(array(
		'controller' => 'migrations',
		'action'     => 'current',
		'directory'  => 'doctrine',
	));