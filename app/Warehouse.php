<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];

    public function items()
    {
    	return $this->belongsToMany('App\Item')->withPivot('qty')->withTimestamps();
    }
}
