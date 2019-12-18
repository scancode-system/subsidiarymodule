<?php

namespace Modules\Subsidiary\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\ItemProduct;
use Modules\Subsidiary\Observers\ItemProductObserver;

class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		ItemProduct::observe(ItemProductObserver::class);
	}

	public function register() {
        //
	}

}
