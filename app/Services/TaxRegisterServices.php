<?php


namespace App\Services;


use App\HouseModel;
use App\Occupation;
use App\Village;
use App\WordNumber;

class TaxRegisterServices
{
    public function createData()
    {
        return $data = [

            'houseModels' => HouseModel::pluck('name', 'id'),
            'wordNumbers' => WordNumber::pluck('name', 'id'),
            'occupations' => Occupation::pluck('name', 'id'),
            'villages' => Village::pluck('name', 'id'),
        ];
    }

    public function getVillageData($request)
    {
        $villages = Village::where('word_number_id', $request->word_number)->pluck('name', 'id');

        $data = '';
        $data .=  '<option value="">- সেট করুন -</option>';

        foreach ($villages as $key => $village) {
            $data .= '<option value="'.$key.'">'.$village.'</option>';
        }

        return $data;

    }

    public function validateStoreData($request)
    {
        return $request->validate([

            'name' => 'required',
            'fathers_name' => 'required',
            'holding_number' => 'required',
            'house_model' => 'required',
            'amount_of_land' => 'required',
            'house_and_land_rate' => 'required',
            'occupation' => 'required',
            'amount_of_tax' => 'required',
            'minor_girl_count' => 'required',
            'adult_girl_count' => 'required',
            'minor_boy_count' => 'required',
            'adult_boy_count' => 'required',
            'count_of_member' => 'required',
            'mobile' => 'required',
            'nid_number' => 'required',
            'sanitation' => 'required',
            'word_number' => 'required',
            'village' => 'required',

        ]);

    }
}
