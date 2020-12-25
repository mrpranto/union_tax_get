<?php

namespace App\Http\Controllers;


use App\TaxAmount;
use App\TaxGet;
use App\TaxRegister;
use App\WordNumber;
use Illuminate\Support\Facades\DB;

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
//        dd($this->dashboardCounter()['tax_year']);

        return view('home', $this->dashboardCounter());
    }

    public function dashboardCounter()
    {
        $query = "select sum(amount_of_tax) as totalTax, sum(tax_amount) as taxGet, word_numbers.name, word_numbers.id from word_numbers
            join tax_registers on (word_numbers.id = tax_registers.word_number_id) join tax_amounts
            on (tax_registers.id = tax_amounts.tax_register_id)
            left join tax_gets on (tax_registers.id = tax_gets.tax_register_id) where (tax_amounts.from = '".date('Y')."')
            and (tax_amounts.to = '".(date('Y') + 1)."') group by word_numbers.id, word_numbers.name ";


        return [

            'word_numbers' => DB::select(DB::raw($query)),

            'total_register_amount' => TaxAmount::query()
                ->where('from', date('Y'))
                ->where('to', (date('Y') + 1))
                ->sum('amount_of_tax'),

            'total_tax_get' => TaxGet::query()
                ->where('from', date('Y'))
                ->where('to', (date('Y') + 1))
                ->sum('tax_amount'),

            'tax_year' => TaxGet::query()
                ->distinct()
                ->select('from', 'to')
                ->get()
        ];
    }

}
