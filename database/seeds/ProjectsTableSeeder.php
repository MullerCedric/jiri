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
        ]);
        \jiri\Project::create([
            'name' => '[API/Vue] Jiri',
            'examination_id' => 1,
        ]);
        \jiri\Project::create([
            'name' => '[PFE] Intégration HTML/CSS du design',
            'examination_id' => 1,
        ]);
    }
}
