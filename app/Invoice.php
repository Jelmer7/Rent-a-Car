<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    public function invoice_lines(){
        return $this->hasMany('App\Invoice_line');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public $table = 'invoices';
    public $timestamps = false;

}
