<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ActorTableSeeder');
		$this->call('FirmTableSeeder');
		$this->call('ContentTableSeeder');
		$this->call('PerformerTableSeeder');
		$this->call('ProducerTableSeeder');
	}

}