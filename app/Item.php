<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   public $fillable=['name','price','category_id'];
   
   
   public function category()
    {
        return $this->belongsTo('App\Category');
    }


     public function warehouses()
    {
    	return $this->belongsToMany('App\Warehouse','item_warehouses')->withPivot('qty')->withTimestamps();
    }
    public function histories()
    {
    	return $this->belongsToMany('App\History', 'item_warehouses')->withPivot('qty')->withTimestamps();
    }
}
