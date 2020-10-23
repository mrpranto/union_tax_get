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
        $taxRegisterAmountYear = [];
        if ($request->filled('holding_no')) {

            $taxRegister->where('holding_no', $request->holding_no);

            $taxRegisterAmountYear = TaxRegister::query()
                ->with('taxAmount')
                ->where('holding_no', $request->holding_no)
                ->firstOrFail();
        }

        if ($request->filled('from_year') && $request->filled('to_year')) {
            $taxRegister->with(['taxAmount' => function ($q) use($request){
                $q->where('from', '<=', $request->from_year)->where('to', '<=', $request->to_year);
            }]);
        }

        $taxRegister = $taxRegister->first();


        return view('TaxGet.create', compact('taxRegister', 'taxGet', 'taxRegisterAmountYear'));
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

       $id = TaxGet::create([

           'tax_register_id' => $request->tax_register_id,
           'date' => $request->tax_get_date,
           'from' => $request->from,
           'to' => $request->to,
           'tax_amount' => $request->amount_of_tax,

       ])->id;

       return redirect()->route('tax-get.show', $id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TaxGet $taxGet)
    {
        return view('TaxGet.show', compact('taxGet'));
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
    public function destroy(TaxGet $taxGet)
    {
        try {

            $taxGet->delete();

        }catch (\Exception $e){
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'আপনি এই ট্যাক্স ডিলিট করতে পারবেন না কারন এই ট্যাক্স অন্য টেবিল এ ব্যবহার করা হয়েছে।');
            }else{
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'ট্যাক্স ডিলিট সফল হয়েছে।');
    }
}
