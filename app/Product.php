<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
    	return $this->hasMany('App\Type');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getPriceAttribute($value)
    {
        $discount = $value * ($this->discount / 100); //Korting in euro's
        $final_price = $value - $discount; //Haal korting af van prijs
        return number_format($final_price, 2); //Zorg altijd voor 2 decimalen
    }
}