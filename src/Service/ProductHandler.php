<?php

namespace App\Service;

class ProductHandler
{
	//计算总金额
	public function testGetTotalPrice($products = []) {
        return array_sum(array_column($products, 'price'));
    }

    //按金额排序
    public function priceOrder($products = []) {
    	$type = 'dessert';
    	$productsFilter = array_filter($products, function($product) use ($type) {
            if ($product['type'] == $type) {
            	return $product;
            }
        });
        $priceArr = array_column($productsFilter, 'price');
        array_multisort($priceArr, SORT_DESC, $productsFilter);
        return $productsFilter;
    }

    //转换时间戳
    public function unixTimeProduct($products = []) {
        foreach ($products as &$value) {
            $value['create_at'] = strtotime($value['create_at']);
        }
        return $products;
    }
}