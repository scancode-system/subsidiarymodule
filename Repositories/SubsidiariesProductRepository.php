<?php

namespace Modules\Subsidiary\Repositories;

use Modules\Subsidiary\Entities\SubsidiariesProduct;
use Modules\Product\Entities\Product;

class SubsidiariesProductRepository
{

	// SAVE
	public static function attachSubsidiaryInProduct(Product $product, $subsidiary_id){
        $product->subsidiaries()->detach();
        $product->subsidiaries()->attach($subsidiary_id);
	}


}
