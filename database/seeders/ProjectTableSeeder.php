<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;
use App\Models\Type;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 20; $i++){
            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->name = $faker->name();
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);
            $new_project->category = $faker->name();
            $new_project->description = $faker->text(200);
            $new_project->created = $faker->date();
            $new_project->save();
        }
    }
}