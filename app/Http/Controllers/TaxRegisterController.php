<?php

namespace App\Http\Controllers;

use App\Services\TaxRegisterServices;
use App\TaxAmount;
use App\TaxRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxRegisterController extends Controller
{

    protected $taxRegisterServices;

    public function __construct(TaxRegisterServices $taxRegisterServices)
    {
        $this->taxRegisterServices = $taxRegisterServices;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxRegisters = TaxRegister::with('occupation')->paginate(30);

        return view('Register.index', compact('taxRegisters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->taxRegisterServices->createData();

        return view('Register.create', $data);
    }


    public function getVillages(Request $request)
    {
        return $this->taxRegisterServices->getVillageData($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->taxRegisterServices->validateStoreData($request);

        DB::transaction(function () use($request){

            $this->taxRegisterServices->storeData($request);

        });

        return redirect()->back()->with('success', 'টাক্স রেজিস্টার করা সফল হয়েছে।');
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
        $data = $this->taxRegisterServices->editData($id);

        return view('Register.edit', $data);
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

        $this->taxRegisterServices->validateUpdateData($request, $id);

        DB::transaction(function () use($request, $id){

            $this->taxRegisterServices->updateData($request, $id);

        });

        return redirect()->route('tax-register.index')->with('success', 'টাক্স রেজিস্টার আপডেট করা সফল হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            TaxAmount::where('tax_register_id', $id)->delete();
            TaxRegister::destroy($id);

        }catch (\Exception $e){

            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'এই ট্যাক্স ইনফর্মেশন আপনি ডিলিট করতে পারবেন না কারন এই ইনফর্মেশন অন্য টেবিল এ ব্যবহার করা হয়েছে। ');
            }else {
                return redirect()->back()->with('error', $e->getMessage());
            }

        }

        return redirect()->route('tax-register.index')->with('success', 'টাক্স রেজিস্টার ডিলিট করা সফল হয়েছে।');
    }
}
