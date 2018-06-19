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

   public $fillable=['name','category_id'];
   

   public function category()
    {
        return $this->hasMany('App\Category');
    }
    


    public function warehouse()
    {
    	return $this->belongsToMany('App\Warehouse','item_warehouses')->withPivot('qty')->withTimestamps();
    }

}
