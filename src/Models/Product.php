<?php

namespace ScottMadsen\Products\Models;

use Illuminate\Database\Eloquent\Model;
use \Rinvex\Attributes\Traits\Attributable;

class Product extends Model implements BigModelInterface {
    use Attributable;

    protected $with = ['eav'];
    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'company_id',
        'external_product_id'
    ];

    public static function minReq(array $product){
        return self::allExist(['name', 'price', 'company_id', 'external_product_id'], $product);
    }

    public static function customReq(array $product, array $requirements){
        return self::allExist($requirements, $product);
    }

    private static function allExist(array $arr, $product){
        foreach ($arr as $req){
            if(isset($product[$req]) && $product[$req] && $product[$req] !== '') continue;

            return true;
        }

        return false;
    }
}
