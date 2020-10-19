<?php

namespace App\Http\Controllers;

use App\TaxGet;
use App\TaxRegister;
use Illuminate\Http\Request;

class TaxGetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxGet = TaxGet::with('taxRegister')->paginate(30);

        return view('TaxGet.index', compact('taxGet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $taxGet = TaxGet::max('id');
        $taxRegister = TaxRegister::query();

        if ($request->filled('holding_no')) {
            $taxRegister->where('holding_no', $request->holding_no);
        }

        if ($request->filled('from_year') && $request->filled('to_year')) {
            $taxRegister->with(['taxAmount' => function ($q) use($request){
                $q->where('from', '<=', $request->from_year)->where('to', '<=', $request->to_year)->first();
            }])
            ;
        }

        $taxRegister = $taxRegister->first();

//        return $taxRegister;

        return view('TaxGet.create', compact('taxRegister', 'taxGet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $checkTaxData = TaxGet::where('from', $request->from)->where('to', $request->to)->count();

       if ($checkTaxData > 0){
           return redirect()->back()->with('error', $request->from .'-'. $request->to.' এই অর্থ বছরে ট্যাক্স গ্রহন হয়ে গেছে।');
       }

       TaxGet::create([

           'tax_register_id' => $request->tax_register_id,
           'date' => $request->tax_get_date,
           'from' => $request->from,
           'to' => $request->to,
           'tax_amount' => $request->amount_of_tax,

       ]);

       return redirect()->back()->with('success', 'টাক্স গ্রহন সফল হয়েছে।');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
