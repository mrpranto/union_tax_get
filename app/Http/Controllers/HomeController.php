<?php

namespace App\Http\Controllers;


use App\TaxGet;
use App\TaxRegister;
use App\WordNumber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        dd($this->dashboardCounter()['word_numbers']);

        return view('home', $this->dashboardCounter());
    }

    public function dashboardCounter()
    {
        return [

            'word_numbers' => WordNumber::query()
                            ->with('taxRegisters')
                            ->withCount(['taxRegisters' => function ($q) {
                                $q->whereHas('taxAmount', function ($q) {
                                    $q->where('from', date('Y'))->where('to', (date('Y') + 1));
                                });
                            }])
                            ->withCount(['taxRegisters as tax_get_count'=> function ($q) {
                                $q->whereHas('tax_get', function ($q) {
                                    $q->where('from', date('Y'))->where('to', (date('Y') + 1));
                                });
                            }])
                            ->get(['name', 'id']),

            'total_register' => TaxRegister::query()
                                ->whereHas('taxAmount', function ($q) {
                                    $q->where('from', date('Y'))->where('to', (date('Y') + 1));
                                })->count(),

            'total_tax_get' => TaxGet::query()
                                ->where('from', date('Y'))->where('to', (date('Y') + 1))
                                ->count(),
        ];
    }

}
