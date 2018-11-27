<?php

namespace iBrand\DatabaseLogger\Test;

use iBrand\DatabaseLogger\DbLogger;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Orchestra\Testbench\TestCase;
use Route;

abstract class BaseTest extends TestCase
{
	use DatabaseMigrations;

	protected $logger ;

	/**
	 * set up test.
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->loadMigrationsFrom(__DIR__ . '/database');

		$this->seedUsers();

        // create logger class
        $this->logger = app(DbLogger::class);

        $logger = $this->logger;

        // listen to database queries
        app('db')->listen(function ($query, $bindings = null, $time = null) use ($logger) {
            $logger->log($query, $bindings, $time);
        });
	}

	/**
	 * @param \Illuminate\Foundation\Application $app
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app['config']->set('database.default', 'testing');
		$app['config']->set('database.connections.testing', [
			'driver'   => 'sqlite',
			'database' => ':memory:',
		]);
        $app['config']->set('ibrand.dblogger', require __DIR__ . '/../config/config.php');
        $app['config']->set('ibrand.dblogger.log_queries', true);

        Route::namespace('iBrand\DatabaseLogger\Test')->group(function () {
            Route::get('test', 'Controller@index')->middleware('databaselogger');
        });


	}

	/**
	 * @param \Illuminate\Foundation\Application $app
	 *
	 * @return array
	 */
	protected function getPackageProviders($app)
	{
		return [
			\Orchestra\Database\ConsoleServiceProvider::class,
			\iBrand\DatabaseLogger\ServiceProvider::class,
		];
	}

	public function seedUsers()
	{
		User::create([
			'name' => 'testname1','email'=>'name1@test.com','password'=>bcrypt('123456')
		]);

	}
}