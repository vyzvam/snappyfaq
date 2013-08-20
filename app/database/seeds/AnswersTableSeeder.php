<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('answers')->truncate();

		$answers = array(
			array('user_id' => '10', 'question_id' => '5',  'answer' => 'Suba'),
			array('user_id' => '11', 'question_id' => '5', 'answer' => 'Vyzvam'),
			array('user_id' => '10', 'question_id' => '5', 'answer' => 'Subathiran'),
			array('user_id' => '11', 'question_id' => '5', 'answer' => 'vyzvam'),
		);

		// Uncomment the below to run the seeder
		DB::table('answers')->insert($answers);
	}

}
