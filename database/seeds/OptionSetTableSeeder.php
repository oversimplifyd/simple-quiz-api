<?php

use Illuminate\Database\Seeder;

class OptionSetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QUIZ\Models\OptionSet::class, 50)->create();
    }
}
