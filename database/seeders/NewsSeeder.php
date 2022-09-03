<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        $categoriesIds = DB::table('categories')
            ->get()
            ->pluck('id');
        $cntCatIds = $categoriesIds->count();

        $sourcesIds = DB::table('sources')
            ->get()
            ->pluck('id');

        $categoriesIds->each(function ($item) use ($faker, $sourcesIds, &$data){
            for ($i = 0; $i < 10; $i++)
                $data[] = [
                    'category_id' => $item,
                    'source_id' => $sourcesIds->random(),
                    'title' => $faker->jobTitle(),
                    'author' => $faker->userName(),
                    'text' => $faker->realText(250),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
        });

        DB::table('news')->insert($data);
    }
}
