<?php

namespace Modules\Subsidiary\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Events\AfterImportEvent;
use Modules\Subsidiary\Listeners\AfterImportProductListener;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider 
{

	public function boot() 
	{

	}

	public function register() 
	{
		Event::listen(AfterImportEvent::class, AfterImportProductListener::class);
	}

}
