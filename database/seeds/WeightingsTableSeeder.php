<?php

use Illuminate\Database\Seeder;

class WeightingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \jiri\Weighting::create([
            'project_id' => 1,
            'weighting' => 35,
        ]);
        \jiri\Weighting::create([
            'project_id' => 2,
            'weighting' => 35,
        ]);
        \jiri\Weighting::create([
            'project_id' => 3,
            'weighting' => 30,
        ]);
        \jiri\Weighting::create([
            'project_id' => 1,
            'apply_for_user' => 3,
            'weighting' => 50,
        ]);
        \jiri\Weighting::create([
            'project_id' => 2,
            'apply_for_user' => 3,
            'weighting' => 50,
        ]);
        \jiri\Weighting::create([
            'project_id' => 3,
            'apply_for_user' => 3,
            'weighting' => 0,
        ]);
    }
}
