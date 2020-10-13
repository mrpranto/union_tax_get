<?php


namespace App\Services;


use App\HouseModel;
use App\Occupation;
use App\TaxRegister;
use App\Village;
use App\WordNumber;

class TaxRegisterServices
{
    public function createData()
    {
        return $data = [

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
            'holding_number' => 'required|numeric|unique:tax_registers,holding_no',
            'building' => 'required|numeric',
            'doa_ripe_tin_shed' => 'required|numeric',
            'raw_chapra' => 'required|numeric',
            'pucca_house' => 'required|numeric',
            'amount_of_land' => 'required|numeric',
            'house_and_land_rate' => 'required|numeric',
            'occupation' => 'required',
            'amount_of_tax' => 'required|numeric',
            'minor_girl_count' => 'nullable|numeric',
            'adult_girl_count' => 'nullable|numeric',
            'minor_boy_count' => 'nullable|numeric',
            'adult_boy_count' => 'nullable|numeric',
            'count_of_member' => 'required',
            'mobile' => 'required|unique:tax_registers,holding_no',
            'nid_number' => 'required|unique:tax_registers,holding_no',
            'sanitation' => 'required',
            'word_number' => 'required',
            'village' => 'required',

        ],[

            'name.required' => 'মালিকের নাম অবশ্যক',
            'fathers_name.required' => 'পিতার নাম অবশ্যক',
            'holding_number.required' => 'হল্ডিং নাম্বার অবশ্যক',
            'building.required' => 'প্রকৃত ঘরের বর্ণনা অবশ্যক',
            'doa_ripe_tin_shed.required' => 'প্রকৃত ঘরের বর্ণনা অবশ্যক',
            'raw_chapra.required' => 'প্রকৃত ঘরের বর্ণনা অবশ্যক',
            'pucca_house.required' => 'প্রকৃত ঘরের বর্ণনা অবশ্যক',
            'amount_of_land.required' => 'জমির পরিমাণ অবশ্যক',
            'house_and_land_rate.required' => 'জমিসহ বসতবাড়ির আনুমানিক মূল্য অবশ্যক',
            'occupation.required' => 'পেশা অবশ্যক',
            'amount_of_tax.required' => 'ধার্যকৃত ট্যাক্স অবশ্যক',
            'minor_girl_count.numeric' => 'অপ্রাপ্ত বয়স্ক মেয়ের সংখ্যা (১৮ এর নিচে) নাম্বার দিতে হবে',
            'adult_girl_count.numeric' => 'প্রাপ্তবয়স্ক মেয়ের সংখ্যা (১৮ এর উর্দ্ধে) নাম্বার দিতে হবে',
            'minor_boy_count.numeric' => 'অপ্রাপ্ত বয়স্ক ছেলের সংখ্যা (২১ এর নিচে) নাম্বার দিতে হবে',
            'adult_boy_count.numeric' => 'প্রাপ্ত বয়স্ক ছেলের সংখ্যা (২১ এর ঊর্ধ্বে) নাম্বার দিতে হবে',
            'count_of_member.required' => 'মোট সদস্য অবশ্যক',
            'mobile.required' => 'মোবাইল নং অবশ্যক',
            'nid_number.required' => 'জাতীয় পরিচয় পত্র নং অবশ্যক',
            'sanitation.required' => 'সানিটেশন অবশ্যক',
            'word_number.required' => 'ওয়ার্ড নাম্বার অবশ্যক',
            'village.required' => 'গ্রাম অবশ্যক',

        ]);

    }

    public function storeData($request)
    {
        TaxRegister::create([

            'name' => $request->name ,
            'father_name' => $request->fathers_name ,
            'holding_no' => $request->holding_number ,
            'word_number_id' => $request->word_number ,
            'village_id' => $request->village  ,
            'building' => $request->building ,
            'doa_ripe_tin_shed' => $request->doa_ripe_tin_shed ,
            'raw_chapra' => $request->raw_chapra ,
            'pucca_house' => $request->pucca_house ,
            'amount_of_land' =>  $request->amount_of_land,
            'house_and_land_rate' => $request->house_and_land_rate ,
            'occupation_id' => $request->occupation ,
            'amount_of_tax' => $request->amount_of_tax ,
            'minor_girl_count' => $request->minor_girl_count ,
            'adult_girl_count' => $request->adult_girl_count ,
            'minor_boy_count' => $request->minor_boy_count ,
            'adult_boy_count' => $request->adult_boy_count ,
            'count_of_member' => $request->count_of_member ,
            'sanitation' => $request->sanitation ,
            'nid_number' => $request->nid_number ,
            'mobile' => $request->mobile,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),


        ]);
    }

    public function editData($id)
    {
        return $data = [

            'wordNumbers' => WordNumber::pluck('name', 'id'),
            'occupations' => Occupation::pluck('name', 'id'),
            'villages' => Village::pluck('name', 'id'),
            'taxRegister' => TaxRegister::findOrFail($id),
        ];
    }

}
