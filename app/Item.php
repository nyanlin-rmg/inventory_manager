<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function item_warehouses ()
    {
    	return $this->belongsToMany('App\Item_warehouse');
    }
}
