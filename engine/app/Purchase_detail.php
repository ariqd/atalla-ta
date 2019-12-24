<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_detail extends Model
{
    protected $guarded = ['id'];

    public function sale()
    {
        return $this->belongsTo('App\Purchase');
    }

    public function stock() 
    {
        return $this->hasOne('App\Stock', 'id', 'inventory_id');
    }
}
