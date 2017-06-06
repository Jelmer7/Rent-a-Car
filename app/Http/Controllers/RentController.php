<?php

namespace App\Http\Controllers;

use App\Car;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index(Request $request){
        $request->session()->reflash();
        $cars = Car::all();
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
        return view('rent.index', compact('cars', 'starting_date', 'end_date'));
    }

    public function form(){
        return view('rent.form');
    }

}
