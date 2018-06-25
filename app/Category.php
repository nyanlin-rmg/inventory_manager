<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['name','description'];

    
    public function items()
    {
        return $this->hasMany('App\Item');
    }

}

