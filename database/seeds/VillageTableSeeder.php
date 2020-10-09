<?php

use App\Village;
use Illuminate\Database\Seeder;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villages = [

            '1' => ['পাইকপাড়া', 'পৈলানপুর'],
            '2' => ['কেদালিয়া', 'ভোজঘাট'],
            '3' => ['হরিশংকরপুর'],
            '4' => ['কান্দড়া', 'পরানপুর', 'চন্দ্রজানী', 'সীতারামপুর'],
            '5' => ['হুদা বাকী', 'আলিয়ার বাকড়ী', 'পোড়াবাকড়ী', 'নরহিরদ্রা'],
            '6' => ['রাজধরপুর', 'বাজিৎপুর', 'ফটিকখালী'],
            '7' => ['পানামী'],
            '8' => ['আর্য্যনারায়নপুর'],
            '9' => ['গোবিন্দপুর', 'সুতলিয়া'],

        ];

        foreach ($villages as $key => $workOrderId)
        {
            foreach ($workOrderId as $subKey => $villageName)
            {
                Village::create([

                    'word_number_id' => $key,
                    'name' => $villageName

                ]);
            }
        }

    }
}
