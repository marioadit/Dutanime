<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create('id_ID');
        $i=0;

        for ($i=2; $i <= 101; $i++) {             
            DB::table('anime')->insert([
                'title'=>$faker->firstNameMale(1). ' ' . $faker->word(1),
                'genre'=>$faker->word(),
                'year'=>$faker->year(),
                'thumbnail'=>$faker->imageUrl($width = 300, $height = 400)
            ]);
        }

        // DB::table('anime')->insert([
        //     'title' => 'Blue Archive',
        //     'genre' => 'Action',
        //     'year' => '2024',
        //     'thumbnail' => 'https://static.wikia.nocookie.net/blue-archive/images/4/44/BA_Visual_1.png/revision/latest?cb=20210410071347'
        // ]);
    }
}
