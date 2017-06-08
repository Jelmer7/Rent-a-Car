<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function invoice_line(){
        return $this->hasMany('App\Invoice_line');
    }
    public $table = 'cars';
    public $timestamps = false;

}
