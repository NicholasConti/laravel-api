<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();


        for ($i = 0; $i < 10; $i++) {

            $type = Type::inRandomOrder()->first();

            $project = new Project();
            $project->project_name = $faker->sentence(3);
            $project->description = $faker->text(200);
            $project->slug = Str::slug($project->project_name, '-');
            $project->start_date = $faker->date();

            $project->type_id = $type->id;

            $project->save();
        }
    }
}
