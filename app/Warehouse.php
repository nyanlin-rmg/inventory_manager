<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];
    

    public function item()
    {
    	return $this->belongsToMany('App\Item','item_warehouses')->withPivot('qty')->withTimestamps();
    }
}
