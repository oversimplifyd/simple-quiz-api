<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(QuestionsTableSeeder::class);
        $this->call(OptionSetTableSeeder::class);
         //$this->call(EntriesTableSeeder::class);
    }
}
