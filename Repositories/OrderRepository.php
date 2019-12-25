<?php

namespace Modules\Subsidiary\Repositories;

use Modules\Order\Entities\Order;
use Modules\Subsidiary\Entities\Subsidiary;

class OrderRepository
{

	public static function loadSubsidiaries($order)
	{
		$items_grouped_by_subsidiaries = $order->items->groupBy(function ($item, $key) {
			return $item->item_product->subsidiary_id;
		});

		$subsidiaries_id = $items_grouped_by_subsidiaries->keys();
		$subsidiaries = collect([]);

		foreach ($subsidiaries_id as $subsidiary_id) 
		{
			$subsidiary = Subsidiary::find($subsidiary_id);
			if(!$subsidiary)
			{
				$subsidiary = (object)['id' => 0, 'name' => 'SEM FILIAL'];
			}
			$subsidiary->items = $items_grouped_by_subsidiaries[$subsidiary_id];

			$total_gross = 0;
			$total_discount = 0;
			$total_addition = 0;
			$total_tax = 0;
			$total = 0;

			foreach ($subsidiary->items as $item) {
				$total_gross+= $item->total_gross;
				$total_discount+= $item->total_discount_value;
				$total_addition+= $item->total_addition_value;
				$total_tax+= $item->total_tax_value;
				$total+= $item->total;				
			}

			$subsidiary->total_gross = $total_gross;
			$subsidiary->total_discount = $total_discount;
			$subsidiary->total_addition = $total_addition;
			$subsidiary->total_tax = $total_tax;
			$subsidiary->total = $total;


			$subsidiaries->push($subsidiary);
		}

		return $subsidiaries;
	}

}
