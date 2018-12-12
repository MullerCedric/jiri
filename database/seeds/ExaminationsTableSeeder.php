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
        \jiri\Examination::create([
            'name' => 'Jury janvier 2019',
            'manager_id' => 1,
            'start_time' => '2019-01-24 08:35:00',
            'is_draft' => 0,
        ]);
        factory(jiri\Examination::class, 4)->create();
    }
}
