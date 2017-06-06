<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('rent.index', compact('cars'));
    }

    public function show(){

    }
}
