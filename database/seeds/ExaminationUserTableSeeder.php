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
        \jiri\ExaminationUser::create([
            'examination_id' => 1,
            'user_id' => 1,
            'role' => 'examiner',
        ]);
        \jiri\ExaminationUser::create([
            'examination_id' => 1,
            'user_id' => 2,
            'role' => 'examiner',
        ]);
        \jiri\ExaminationUser::create([
            'examination_id' => 1,
            'user_id' => 3,
            'role' => 'student',
        ]);
        \jiri\ExaminationUser::create([
            'examination_id' => 1,
            'user_id' => 4,
            'role' => 'student',
        ]);
        \jiri\ExaminationUser::create([
            'examination_id' => 1,
            'user_id' => 5,
            'role' => 'student',
        ]);
        for ($i = 1; $i < 5; $i++){
            \jiri\ExaminationUser::create([
                'examination_id' => 2,
                'user_id' => $i,
                'role' => (bool)rand(0, 1) ? 'examiner' : 'student',
            ]);
        }
    }
}
