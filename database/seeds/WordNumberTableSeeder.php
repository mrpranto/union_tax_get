<?php

use App\WordNumber;
use Illuminate\Database\Seeder;

class WordNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wordNumbers = ['০১', '০২', '০৩', '০৪', '০৫', '০৬', '০৭', '০৮', '০৯'];

        foreach ($wordNumbers as $key => $wordNumber)
        {
            WordNumber::create([

                'name' => $wordNumber

            ]);
        }
    }
}
