<?php

namespace Modules\Subsidiary\Http\ViewComposers\Loader\Products;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Subsidiary\Repositories\SubsidiaryRepository;

class EditComposer extends ServiceComposer 
{

    private $select_subsidiaries;

    public function assign($view)
    {
        $this->selectSubsidiaries();
    }


    private function selectSubsidiaries()
    {
        $this->select_subsidiaries = SubsidiaryRepository::loadToSelect('id', 'name');
    }


    public function view($view)
    {
        $view->with('select_subsidiaries', $this->select_subsidiaries);
    }

}