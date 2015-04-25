<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->insert(array(
			'first_name' 	=> 'Juliette',
			'last_name'		=> 'Cetina',
			'email' 		=> 'asd@asd.com',
			'password' 		=> \Hash::make('1234'),
			'type'			=> 'admin'
		));

		\DB::table('user_profiles')->insert(array(
			'user_id'		=> 1,
			'birthdate'		=> '1989/01/01'
		));
	}

}