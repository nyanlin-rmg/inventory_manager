<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_warehouse extends Model
{
    protected $fillable = ['item_id', 'warehouse_id', 'qty'];

    public function item()
    {
    	return $this->belongsToMany('App\Item');
    }
}
