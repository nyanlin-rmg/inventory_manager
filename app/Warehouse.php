<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];

    public function Item()
    {
    	return $this->belongsToMany('App\Item')->withPivot('qty');
    }
}
