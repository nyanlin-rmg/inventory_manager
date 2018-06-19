<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function warehouse ()
    {
    	return $this->belongsToMany('App\Warehouse')->withPivot(['item_id','warehouse_id','qty']);
    }
}
