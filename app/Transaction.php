<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function stock(){
        return $this->hasOne('App\Stock','id','stock_id');
    }
}
