<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function add($id, Request $request){
        $request->session()->reflash();
        $car = Car::findorfail($id);
        Cart::add($car->id, 'car', 1, $car->price, ['brand' => $car->brand,
            'type' => $car->type,
            'starting_date' => session('starting_date'),
            'end_date' => session('end_date')
        ]);
        return redirect('rent');
    }

    public function delete($id){
        Cart::remove($id);
        return redirect('rent');
    }
}
