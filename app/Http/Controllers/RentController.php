<?php

namespace App\Http\Controllers;

use App\Car;
use App\Invoice_line;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentController extends Controller
{
    public function index(Request $request){
        $request->session()->reflash();
        if(($request['daterange'] != null)){
        $daterange = explode('-', $request['daterange']);
        $starting_date = preg_replace('/\s+/', '', $daterange[0]);
        $end_date = preg_replace('/\s+/', '', $daterange[1]);
            $request->session()->put('starting_date', $starting_date);
            $request->session()->put('end_date', $end_date);
        }else{
            $starting_date = session('starting_date');
            $end_date = session('end_date');
        }
        $starting_date = Carbon::parse($starting_date);
        $end_date = Carbon::parse($end_date);
        $invoice_lines = Invoice_line::where([['starting_date', '<=', "$starting_date"],
                                            ['end_date', '>=', "$starting_date"]])
                                    ->orWhere([['starting_date', '<=', "$end_date"],
                                                ['end_date', '>=', "$end_date"]])
                                    ->orWhere([['starting_date', '>=', "$starting_date"],
                                                ['end_date', '<=', "$end_date"]])->get();

        $rented_cars = [];
        foreach($invoice_lines as $invoice_line){
            array_push($rented_cars, $invoice_line->car_id);
        }
        $cars = Car::whereNotIn('id', $rented_cars)->get();
        return view('rent.index', compact('cars', 'starting_date', 'end_date'));
    }

    public function form(){
        return view('rent.form');
    }

}
