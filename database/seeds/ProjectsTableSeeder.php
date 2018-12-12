<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \jiri\Project::create([
            'name' => '[Wordpress] La CiTé, École vivante',
            'examination_id' => 1,
            'weighting' => 35,
        ]);
        \jiri\Project::create([
            'name' => '[API/Vue] Jiri',
            'examination_id' => 1,
            'weighting' => 35,
        ]);
        \jiri\Project::create([
            'name' => '[PFE] Intégration HTML/CSS du design',
            'examination_id' => 1,
            'weighting' => 30,
        ]);
        \jiri\Project::create([
            'name' => '[Wordpress] La CiTé, École vivante',
            'examination_id' => 1,
            'apply_for_user' => 3,
            'weighting' => 50,
        ]);
        \jiri\Project::create([
            'name' => '[API/Vue] Jiri',
            'examination_id' => 1,
            'apply_for_user' => 3,
            'weighting' => 50,
        ]);
        \jiri\Project::create([
            'name' => '[PFE] Intégration HTML/CSS du design',
            'examination_id' => 1,
            'apply_for_user' => 3,
            'weighting' => 0,
        ]);
    }
}
