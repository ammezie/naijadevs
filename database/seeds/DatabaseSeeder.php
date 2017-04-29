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
        $this->call(JobTypesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
