<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ExaminationsTableSeeder::class);
        $this->call(ExaminationUserTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(WeightingsTableSeeder::class);
        $this->call(MarksTableSeeder::class);
    }
}
