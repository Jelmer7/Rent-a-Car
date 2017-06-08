<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Invoice_line;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('car.index', compact('cars'));
    }

    public function create(){
        return view('car.create');
    }

    public function store(request $request){
        $car = new Car();
        $car->license_plate = $request['license_plate'];
        $car->brand = $request['brand'];
        $car->type = $request['type'];
        $car->price = $request['price'];
        $car->class = $request['class'];
        $car->description = $request['description'];
        if($request['GPS'] != null) {
            $car->gps= true;
        }else{
            $car->gps = false;
        }
        $car->save();
        return redirect('cars');
    }

    public function edit($id){
        $car = Car::findorfail($id);
        return view('car.edit', compact('car'));
    }

    public function update(request $request, $id){
        $car = Car::findorfail($id);
        $car->license_plate = $request['license_plate'];
        $car->brand = $request['brand'];
        $car->type = $request['type'];
        $car->price = $request['price'];
        $car->class = $request['class'];
        $car->description = $request['description'];
        if($request['GPS'] != null) {
            $car->gps= true;
        }else{
            $car->gps = false;
        }
        $car->update();
        return redirect('cars');
    }

    public function destroy($id){
        $car = Car::findorfail($id);
        $lines = $car->invoice_line;
        foreach($lines as $line){
            $line->delete();
        }
        $car->delete();
        return redirect('cars');
    }
}
