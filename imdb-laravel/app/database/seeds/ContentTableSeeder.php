<?php

use Illuminate\Database\Schema\Blueprint;

class ContentTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('contents')->truncate();

		
		$items = array(
			'AAA-001' 	=> '001',
			'BBB-002' 	=> '002',
			'CCC-003' 	=> '003',
			'DDD-004' 	=> '004',
			'EEE-005' 	=> '005',
			);

		$date = new DateTime;
		$contents = array();

		foreach ($items as $sku => $episode) {
			$content = array(
				'sku' 			=> $sku,
				'episode' 		=> $episode,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($contents, $content);
		}

		DB::table('contents')->insert($contents);
		unset($contents);
		$contents = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}