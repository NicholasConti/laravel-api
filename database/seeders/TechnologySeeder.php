<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'JavaScript', 'VueJS', 'PHP', 'Laravel'];

        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($technologies as $tec) {
            $newTec = new Technology();
            $newTec->name = $tec;
            $newTec->slug = Str::slug($newTec->name);

            $newTec->save();
        }
    }
}
