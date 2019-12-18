<?php

namespace Modules\Subsidiary\Http\ViewComposers\Pdf;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Subsidiary\Repositories\OrderRepository;

class OrderComposer extends ServiceComposer {

    private $subsidiaries;

    public function assign($view)
    {
        $this->subsidiaries($view->order);
    }

    private function subsidiaries($order)
    {
        $subsidiaries = OrderRepository::loadSubsidiaries($order);
        //dd($subsidiaries);


        $this->subsidiaries = $subsidiaries;
    }

    public function view($view)
    {
        $view->with('subsidiaries', $this->subsidiaries);
    }

}