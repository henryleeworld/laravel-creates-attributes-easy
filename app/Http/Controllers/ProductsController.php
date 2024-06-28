<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function attach() 
    {
        $product = Product::with('attributes')->firstOrFail();
        echo '目前已有的產品屬性：' . (empty($attributeAry = $product->attributes->implode('title', '、')) ? '無' : $attributeAry) . PHP_EOL;
        $attributeAry = [
            [
                'title' => 'color',
                'value' => '白色',
            ],
            [
                'title' => 'size',
                'value' => 'XXS, XS, S, M, L, XL, XXL, 3XL',
            ],
            [
                'title' => 'quantity',
                'value' => '220',
            ],
            [
                'title' => 'fabric_details',
                'value' => '高級羽絨',
            ],
        ];
        $product->attachAttributes($attributeAry);
        $product = Product::with('attributes')->firstOrFail();
        echo '新增後產品屬性是：' . $product->attributes->implode('title', '、') . PHP_EOL;
    }
}
