<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\User;
use Illuminate\Support\Facades\Auth;
use App;

class InvoicesController extends Controller
{
    public function index(){
        $invoices = Invoice::where('user_id', '=', Auth::user()->id)->get();
        return view('invoices.index', compact('invoices'));
    }

    public function show($id){
        $invoice = Invoice::FindorFail($id);
        $user = User::findorfail($invoice->user_id);
        $invoice_lines = ($invoice->invoice_lines);

        $total = 0;
        foreach($invoice_lines as $line){
            $total += $line->starting_date->diffInDays($line->end_date) * $line->car->price;
        }
        $btw = $total / 100 * 21;
        $total += $btw;
        return view('invoices.show', compact('invoice', 'user', 'invoice_lines', 'total', 'btw'));
    }

    public function pdf($id){
        $invoice = Invoice::FindorFail($id);
        $user = User::FindorFail($invoice->user_id);
        $invoice_lines = ($invoice->invoice_lines);
        $total = 0;
        foreach($invoice_lines as $line){
            $total += $line->starting_date->diffInDays($line->end_date) * $line->car->price;
        }

        $btw = $total / 100 * 21;
        $total += $btw;
        $data = [
            'invoice' => $invoice,
            'user' => $user,
            'invoice_lines' => $invoice_lines,
            'total' => $total,
            'btw' => $btw
        ];
        // Make new dompdf wrapper for the pdf
        $pdf = App::make('dompdf.wrapper');
        // Throw the printing view in the pdf
        $pdf->loadhtml(view('invoices.pdf',$data))->setPaper('a4');
        // Stream the pdf to the user
        return $pdf->stream();
    }
}
