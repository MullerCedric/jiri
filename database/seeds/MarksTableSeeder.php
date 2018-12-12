<?php

use Illuminate\Database\Seeder;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First student
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 3,
            'project_id' => 4,
            'mark' => rand(0, 20),
            'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 3,
            'project_id' => 5,
            'mark' => rand(0, 20),
            'comment' => 'Praesent sed sem euismod, mollis risus et, dictum neque. Morbi congue, dui dignissim accumsan vulputate',
        ]);

        // Second student
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 4,
            'project_id' => 1,
            'mark' => rand(0, 20),
            'comment' => 'Dolor tellus lacinia purus',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 4,
            'project_id' => 2,
            'mark' => rand(0, 20),
            'comment' => 'Donec nisi ex, cursus vel felis a, vestibulum convallis lorem',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 4,
            'project_id' => 3,
            'mark' => rand(0, 20),
            'comment' => 'Nam id odio sit amet tortor finibus varius',
        ]);

        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 4,
            'project_id' => 1,
            'mark' => rand(9, 15),
            'comment' => 'Ok',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 4,
            'project_id' => 2,
            'mark' => rand(6, 13),
            'comment' => 'Bof',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 4,
            'project_id' => 3,
            'mark' => rand(15, 20),
            'comment' => 'Parfait',
        ]);

        // Last student
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 5,
            'project_id' => 1,
            'mark' => rand(0, 20),
            'comment' => 'Mauris laoreet lacus leo, vitae imperdiet dolor egestas ac',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 5,
            'project_id' => 2,
            'mark' => rand(0, 20),
            'comment' => 'Curabitur vestibulum feugiat nibh eu viverra',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 1,
            'student_id' => 5,
            'project_id' => 3,
            'mark' => rand(0, 20),
            'comment' => 'Vestibulum eu velit ac urna ultricies',
        ]);

        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 5,
            'project_id' => 1,
            'mark' => rand(0, 9),
            'comment' => 'À jeter',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 5,
            'project_id' => 2,
            'mark' => rand(5, 13),
            'comment' => 'Bon back, horrible front',
        ]);
        \jiri\Mark::create([
            'examination_id' => 1,
            'examiner_id' => 2,
            'student_id' => 5,
            'project_id' => 3,
            'mark' => rand(4, 14),
            'comment' => 'Design à revoir',
        ]);
    }
}
