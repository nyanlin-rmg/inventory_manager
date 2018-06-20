<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function warehouses()
    {
    	return $this->belongsToMany('App\Warehouse');
    }
}
