<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['name','description'];
    
    public function Item()
    {
        return $this->belongsTo('App\Item');
    }
}

