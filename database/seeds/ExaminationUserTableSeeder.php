<?php

use Illuminate\Database\Seeder;

class ExaminationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++){
            \jiri\ExaminationUser::create([
                'examination_id' => 1,
                'user_id' => $i,
                'role' => (bool)rand(0, 1) ? 'examiner' : 'student',
            ]);
        }
    }
}
