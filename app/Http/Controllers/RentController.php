<?php

namespace App\Http\Controllers;

use App\Car;
use App\Invoice_line;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index(Request $request){
        Carbon::setLocale('nl');
        $request->session()->reflash();
        if(($request['daterange'] != null)){
        $daterange = explode('-', $request['daterange']);
        $starting_date = Carbon::parse(preg_replace('/\s+/', '', $daterange[0]));
        $end_date = Carbon::parse(preg_replace('/\s+/', '', $daterange[1]));
            $request->session()->put('starting_date', $starting_date);
            $request->session()->put('end_date', $end_date);
        }else{
            $starting_date = Carbon::parse(session('starting_date'));
            $end_date = Carbon::parse(session('end_date'));
        }
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
        $cars = Car::all();
        return view('rent.index', compact('cars', 'starting_date', 'end_date', 'rented_cars'));
    }

    public function form(){
        return view('rent.form');
    }

    public function check(){
        $user = Auth::user();
        $cart = Cart::content();
        return view('rent.check', compact('cart', 'user'));
    }

}
