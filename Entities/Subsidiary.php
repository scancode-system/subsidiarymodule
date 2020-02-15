<?php

namespace Modules\Subsidiary\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Subsidiary extends Model
{
	protected $guarded = [];

	public function products()
	{
		return $this->belongsToMany(Product::class, 'subsidiaries_products');
	}
}
