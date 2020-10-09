<?php

use App\Occupation;
use Illuminate\Database\Seeder;

class OccupationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = ['সরকারী চাকুরী', 'বেস্রকারী চাকুরী', 'কৃষক', 'দিনমজুর', 'ব্যবসায়ী', 'মিস্ত্রি', 'বেকার', 'গৃহিণী', 'অন্যান্য'];

        foreach ($occupations as $occupation){

            Occupation::create([

                'name' => $occupation

            ]);
        }

    }
}

