<?php

namespace App\Http\Controllers;

use App\Services\TaxRegisterServices;
use App\TaxRegister;
use Illuminate\Http\Request;

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
        $taxRegisters = TaxRegister::paginate(30);

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

        $this->taxRegisterServices->storeData($request);

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