<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    public function invoice_lines(){
        return $this->hasMany('App\Invoice_line');
    }
    public $table = 'invoices';
    public $timestamps = false;

}
