<hr>
<h4>Filial</h4>
{{ Form::model($product->subsidiaries_product, ['route' => ['subsidiariesproducts.store', $product]]) }}
<div class="row">
	<div class="col-md-10">
		<div class="input-group">
			<span class="input-group-prepend" data-toggle="modal" data-target="#modal_create_subsidiary">
				{{ Form::button('<i class="fa fa-plus-square-o"></i>', ['class' => 'btn btn-primary']) }}
			</span>
			{{ Form::select('subsidiary_id', $select_subsidiaries, null, ['class' => 'form-control', 'placeholder' => 'Sem Filial']) }}
		</div>
	</div>
	<div class="col-md-2">
		{{ Form::button('<i class="fa fa-save float-left"></i><span>Salvar</span>', ['class' => 'w-100 btn btn-brand btn-primary', 'type' => 'submit']) }}
	</div>
</div>
{{ Form::close() }}
@include('subsidiary::loader.products.modals.modal_create_subsidiary')


