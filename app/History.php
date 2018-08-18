<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	protected $fillable = ['warehouse', 'item', 'qty', 'action'];

	public function items()
	{
		return $this->belongsToMany('App\Item','item_warehouses')->withPivot('qty')->withTimestamps();
	}
	 public function warehouses()
	{
		return $this->belongsToMany('App\Warehouse','item_warehouses')->withPivot('qty')->withTimestamps();
	}
}


?>