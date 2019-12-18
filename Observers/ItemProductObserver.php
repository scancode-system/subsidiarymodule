<?php

namespace Modules\Subsidiary\Observers;

use Modules\Order\Entities\ItemProduct;

class ItemProductObserver
{

	public function creating(ItemProduct $item_product)
	{
		$subsidiary = $item_product->item->product->subsidiaries()->first();
		if($subsidiary)
		{
			$item_product->subsidiary_id = $subsidiary->id;
			$item_product->subsidiary_name = $subsidiary->name;
		}
	}	

}
