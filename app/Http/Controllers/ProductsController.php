<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function attach() 
    {
        $product = Product::with('attributes')->firstOrFail();
        echo __('Currently product attributes: ') . (empty($attributeAry = $product->attributes->implode('title', '、')) ? __('None') : $attributeAry) . PHP_EOL;
        $attributeAry = [
            [
                'title' => __('color'),
                'value' => __('White'),
            ],
            [
                'title' => __('size'),
                'value' => 'XXS, XS, S, M, L, XL, XXL, 3XL',
            ],
            [
                'title' => __('quantity'),
                'value' => '220',
            ],
            [
                'title' => __('fabric details'),
                'value' => __('Premium down'),
            ],
        ];
        $product->attachAttributes($attributeAry);
        $product = Product::with('attributes')->firstOrFail();
        echo __('The added product attributes are: ') . $product->attributes->implode('title', '、') . PHP_EOL;
    }
}
