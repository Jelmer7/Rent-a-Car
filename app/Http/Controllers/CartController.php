<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function add($id, Request $request){
        //Sessie gegevens vernieuwen
        $request->session()->reflash();

        //Gekozen auto toevoegen aan de winkelwagen
        $car = Car::findorfail($id);
        Cart::add($car->id, 'car', 1, $car->price, ['brand' => $car->brand,
            'type' => $car->type,
            'starting_date' => session('starting_date'),
            'end_date' => session('end_date'),
            'license_plate' => $car->license_plate
        ]);
        return redirect('rent');
    }

    public function delete($id){
        //Auto verwijderen uit de winkelwagen
        Cart::remove($id);
        return redirect('rent');
    }
}
