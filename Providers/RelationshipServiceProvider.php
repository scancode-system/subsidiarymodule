<?php

namespace Modules\Subsidiary\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Product\Entities\Product;
use Modules\Subsidiary\Entities\Subsidiary;
use Modules\Subsidiary\Entities\SubsidiariesProduct;


class RelationshipServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Product::addDynamicRelation('subsidiaries', function (Product $product) {
            return $product->belongsToMany(Subsidiary::class, 'subsidiaries_products');
        });

        Product::addDynamicRelation('subsidiaries_product', function (Product $product) {
            return $product->hasOne(SubsidiariesProduct::class);
        });
    }

    public function register()
    {

    }

}
