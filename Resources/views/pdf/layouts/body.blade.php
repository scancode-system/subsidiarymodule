<table class="w-100 mb-3">
	@include('pdf::pdf.tables.thead')
	<tbody>
		@foreach($subsidiary->items as $item)
		<tr>
			@if($setting_pdf_image->show)
			<td class="border-bottom border-left border-dark p-2">
				<img src="{{ url($item->item_product->image) }}" class="width-75">
			</td>
			@endif
			<td class="border-bottom border-dark {{ (!$setting_pdf_image->show)?'border-left':'' }} p-2">{{ $item->item_product->sku }}</td>
			<td class="border-bottom border-dark p-2">{{ $item->item_product->description }}</td>
			@loader(['loader_path' => 'pdf.items.tr'])
			<td class="border-bottom border-dark text-center p-2">@currency($item->price)</td>
			@if($setting_pdf_discount->show)
			<td class="border-bottom border-dark text-center p-2">@currency($item->discount_value)</td>
			@endif
			@if($setting_pdf_addition->show)
			<td class="border-bottom border-dark text-center p-2">@currency($item->addition_value)</td>
			@endif
			@if($setting_pdf_taxes->show)
			<td class="border-bottom border-dark text-center p-2">@currency($item->tax_value)<br><small>(ipi)</small></td>
			@endif
			<td class="border-bottom border-dark text-center p-2">{{ $item->qty }}</td>
			<td class="border-bottom border-right border-dark text-center p-2">@currency($item->total)</td>
		</tr> 
		@endforeach
	</tbody>
</table>