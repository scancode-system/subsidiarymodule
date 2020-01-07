<?php

namespace Modules\Subsidiary\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Subsidiary\Repositories\SubsidiaryRepository;

class AfterImportProductListener
{

    public function handle($event)
    {
        $product = $event->product();
        $data = $event->data();
        $subsidiary = $this->subsidiaryId($data['subsidiary_id'], $data['subsidiary_name']);
        if($subsidiary)
        {
            $product->subsidiaries()->sync([$subsidiary->id]);
        }
    }

    private function subsidiaryId($subsidiary_id, $subsidiary_name)
    {
        if(!is_null($subsidiary_name))
        {
            $subsidiary = SubsidiaryRepository::loadByName($subsidiary_name);
            if(!$subsidiary)
            {
                $subsidiary = SubsidiaryRepository::store(['id' => $subsidiary_id, 'name' => $subsidiary_name]);
            } 
            return $subsidiary;   
        }
    }
}