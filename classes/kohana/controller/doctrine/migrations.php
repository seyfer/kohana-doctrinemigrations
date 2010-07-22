<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The Doctrine_Migrations Controller allows the user to run the database
 * migrations, either up or down, using the default database connection.
 *
 * @package    DoctrineMigrations
 * @author     Synapse Studios
 * @author     Mathew Davies <thepixeldeveloper@googlemail.com>
 * @copyright  Copyright (c) 2009 Synapse Studios
 */
abstract class Kohana_Controller_Doctrine_Migrations extends Controller
{
	/**
	 * @var Doctrine_Migration
	 */
	protected $_migration = NULL;
	
	/**
	 * Enables Doctrine and establishes a database connection to the default
	 * database as specified in the database config.
	 *
	 * @param Kohana_Request $request
	 */
	public function  __construct(Kohana_Request $request)
	{
		if ( ! extension_loaded('pdo'))
		{
			throw new Kohana_Exception('PDO needs to be installed with MySQL support');
		}
		
		require Kohana::find_file('vendor', 'doctrine/lib/Doctrine');
		spl_autoload_register(array('Doctrine', 'autoload'));

		// Which DB group we're going to use?
		$group = Kohana::config('migrations.group');

		// Load database settings
		$config = Kohana::config('database.'.$group);

		// Build DSN string.
		$connection = Doctrine_Manager::connection
		(
			$config['type'].'://'.
			$config['connection']['username'].':'.
			$config['connection']['password'].'@'.
			$config['connection']['hostname'].'/'.
			$config['connection']['database']
		);

		$this->_migration = new Doctrine_Migration(APPPATH.'migrations');

		parent::__construct($request);
	}

	/**
	 * Runs the migration to the specified version or to the latest version if
	 * none is provided.
	 */
	public function action_index()
	{
		$current = $this->_migration->getCurrentVersion();

		// If no version was specified, find the latest version.
		$version = (int) $this->request->param('version', $this->_migration->getLatestVersion());

		try
		{
			$this->_migration->migrate($version);
			
			echo __('Database migration is complete. Database version was #:current and now is #:version',
				array(':current' => $current, ':version' => $version)).PHP_EOL;
			
			exit (0);
		}
		catch(Doctrine_Exception $e)
		{
			Kohana::$log->add(Kohana::ERROR, Kohana::exception_text($e));

			echo __('Database migration failed, check the Kohana log.').PHP_EOL;

			exit(1);
		}
	}

	/**
	 * Returns the current migration version
	 */
	public function action_current()
	{
		echo $this->_migration->getCurrentVersion().PHP_EOL;
	}
}