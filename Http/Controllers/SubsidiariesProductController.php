<?php

namespace Modules\Subsidiary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Subsidiary\Repositories\SubsidiariesProductRepository;

class SubsidiariesProductController extends Controller
{

    public function store(Request $request, Product $product)
    {
        SubsidiariesProductRepository::attachSubsidiaryInProduct($product, $request->subsidiary_id);
        $subsidiary = $product->subsidiaries()->first();
        if($subsidiary)
        {
            return back()->with('success', 'Produto '.$product->description.' foi vinculado para filial '.$subsidiary->name.'.');
        } else 
        {
            return back()->with('success', 'Produto '.$product->description.' foi desvinculado de filial.');
        }
        
    }

}
