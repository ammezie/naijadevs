<?php

use Illuminate\Database\Seeder;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            'name' => 'Full Time',
            'slug' => str_slug('Full Time'),
            'color' => 'orange',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('job_types')->insert([
            'name' => 'Part Time',
            'slug' => str_slug('Part Time'),
            'color' => 'red',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('job_types')->insert([
            'name' => 'Contract',
            'slug' => str_slug('Contract'),
            'color' => 'brown',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('job_types')->insert([
            'name' => 'Freelance',
            'slug' => str_slug('Freelance'),
            'color' => 'violet',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('job_types')->insert([
            'name' => 'Internship',
            'slug' => str_slug('Internship'),
            'color' => 'olive',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
