<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];



     public function item ()
    {
    	return $this->belongsToMany('App\Item')->withPivot(['item_id','warehouse_id','qty']);
    }
    public function Item()

    public function item()

    {
    	return $this->belongsToMany('App\Item')->withPivot('qty')->withTimestamps();
    }
}
