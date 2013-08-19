<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('questions')->truncate();

		$questions = array(
			array('user_id' => '10', 'question' => 'What is your favorite color?', 'solved' => '0'),
			array('user_id' => '11', 'question' => 'What do you like about Laravel?', 'solved' => '0'),
			array('user_id' => '10', 'question' => 'What is PHP?', 'solved' => '0'),
			array('user_id' => '11', 'question' => 'Where can you find jQuery?', 'solved' => '0'),
		);

		// Uncomment the below to run the seeder
		DB::table('questions')->insert($questions);
	}

}
