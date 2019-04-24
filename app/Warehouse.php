<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'address', 'phone','image'];

    public function items()
    {
    	return $this->belongsToMany('App\Item','item_warehouses')->withPivot('qty')->withTimestamps();
    }
    public function histories()
    {
    	return $this->belongsToMany('App\History', 'item_warehouses')->withPivot('qty')->withTimestamps();
    }
}