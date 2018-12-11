<?php

use Illuminate\Database\Seeder;

class ExaminationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(jiri\Examination::class, 4)->create();
    }
}
