<?php

namespace App\Http\Controllers;

use App\Car;
use App\Invoice_line;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Invoice;
use App;

class RentController extends Controller
{
    public function index(Request $request){
        //Carbon instellen op nederlandse tijdweergave
        Carbon::setLocale('nl');

        //Sessie gegevens vernieuwen
        $request->session()->reflash();

        //Datums omzetten in carbon items
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

        //Alle factuurlijnen ophalen die verhuurd zijn tussen de gekozen start en eind datum
        $invoice_lines = Invoice_line::where([['starting_date', '<=', "$starting_date"],
                                            ['end_date', '>=', "$starting_date"]])
                                    ->orWhere([['starting_date', '<=', "$end_date"],
                                                ['end_date', '>=', "$end_date"]])
                                    ->orWhere([['starting_date', '>=', "$starting_date"],
                                                ['end_date', '<=', "$end_date"]])->get();

        //Verhuurde auto's in een array opslaan
        $rented_cars = [];
        foreach($invoice_lines as $invoice_line){
            array_push($rented_cars, $invoice_line->car_id);
        }

        //Alle auto's ophalen
        $cars = Car::all();
        return view('rent.index', compact('cars', 'starting_date', 'end_date', 'rented_cars'));
    }

    public function form(){
        return view('rent.form');
    }

    public function check(){
        //Controlepagina voor winkelwagen
        $user = Auth::user();
        $cart = Cart::content();
        return view('rent.check', compact('cart', 'user'));
    }

    public function invoice(){
        //Factuur aanmaken
        $user = Auth::user();
        $cart = Cart::content();
        $invoice = new Invoice();
        $invoice->user_id = $user->id;
        $invoice->date = Carbon::now();
        $invoice->save();

        //Factuurlijnen maken
        foreach($cart as $item){
            $line = new Invoice_line();
            $line->starting_date = $item->options->starting_date;
            $line->end_date = $item->options->end_date;
            $line->car_id = $item->id;
            $line->invoice_id = $invoice->id;
            $line->save();
        }

        //Winkelwagen leeghalen
        Cart::destroy();
        return redirect('invoices/'. $invoice->id);
    }

    public function daylist(Request $request){
        //Daglijst creëren
        $date = Carbon::parse($request['date']);
        $invoice_lines = Invoice_line::where('starting_date', '=', $date)->get();
        return view('daylist.index', compact('invoice_lines', 'date'));
    }

    public function daylistform(){
        return view('daylist.form');
    }

    public function pdf($date){
        $invoice_lines = Invoice_line::where('starting_date', '=', $date)->get();

        $data = [
            'invoice_lines' => $invoice_lines
        ];
        // Make new dompdf wrapper for the pdf
        $pdf = App::make('dompdf.wrapper');
        // Throw the printing view in the pdf
        $pdf->loadhtml(view('daylist.pdf',$data))->setPaper('a4');
        // Stream the pdf to the user
        return $pdf->stream();
    }

}
