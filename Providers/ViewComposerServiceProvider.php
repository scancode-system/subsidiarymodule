<?php

namespace Modules\Subsidiary\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Subsidiary\Http\ViewComposers\Loader\Products\EditComposer;
use Modules\Subsidiary\Http\ViewComposers\Pdf\OrderComposer;

class ViewComposerServiceProvider extends ServiceProvider 
{

	public function boot() {
		// products
		View::composer('subsidiary::loader.products.edit', EditComposer::class);
		// pdf
		View::composer('subsidiary::pdf.order', OrderComposer::class);
	}

	public function register() {
        //
	}

}
