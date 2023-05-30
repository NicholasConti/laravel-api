<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $project = Project::inRandomOrder()->first();
            $message = new Message();
            $message->author = fake()->name;
            $message->email = fake()->safeEmail();
            $message->message = fake()->text();
            $message->project_id = $project->id;
            $message->save();
        }
    }
}
