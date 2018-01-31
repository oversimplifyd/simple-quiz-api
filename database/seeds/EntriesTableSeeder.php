<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
use Faker\Factory as Faker;
 
class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        DB::table('entries')->insert([
	            'phone_number' => $faker->phoneNumber(11),
	            'channel' => $faker->lastName,
	            'source_id' => $faker->randomDigitNotNull(11),
                'poll_id' => $faker->randomDigitNotNull(11),
                'disqualified' => $faker->boolean,
                'answer' => $faker->lastName
	        ]);
        }
    }
    
}
