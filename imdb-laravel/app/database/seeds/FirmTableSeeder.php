<?php

use Illuminate\Database\Schema\Blueprint;

class FirmTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('firms')->truncate();

		
		$companies = array(
			'AAA Company' 	=> 'AAA',
			'BBB Company' 	=> 'BBB',
			'CCC Company' 	=> 'CCC',
			'DDD Company' 	=> 'DDD',
			'EEE Company' 	=> 'EEE',
			);

		$date = new DateTime;
		$firms = array();

		foreach ($companies as $name => $quote) {
			$firm = array(
				'name' 			=> $name,
				'quote' 		=> $quote,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($firms, $firm);
		}

		DB::table('firms')->insert($firms);
		unset($firms);
		$firms = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}