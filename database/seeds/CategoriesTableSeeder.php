<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Backend',
            'slug' => str_slug('Backend'),
            'color' => 'teal',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Frontend',
            'slug' => str_slug('Frontend'),
            'color' => 'purple',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Designer',
            'slug' => str_slug('Designer'),
            'color' => 'green',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'DevOps',
            'slug' => str_slug('DevOps'),
            'color' => 'blue',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
