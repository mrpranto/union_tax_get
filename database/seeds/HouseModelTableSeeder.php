<?php

use App\HouseModel;
use Illuminate\Database\Seeder;

class HouseModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houseModels = ['দালান', 'ডোয়া পাকা টিনশেড', 'কাঁচা ছাপড়া', 'পাকা ঘর /ওয়াল'];

        foreach ($houseModels as $houseModel)
        {
            HouseModel::create([

                'name' => $houseModel,

            ]);
        }

    }
}
