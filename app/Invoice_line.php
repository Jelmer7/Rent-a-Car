<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_line extends Model
{
    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }
    protected $dates = ['starting_date', 'end_date'];
    public $table = 'invoice_lines';
    public $timestamps = false;
}
