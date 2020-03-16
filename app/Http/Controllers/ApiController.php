<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allProducts()
    {

        $products = Product::select(
            'products.*',
            'categories.category as category_name'
            )->join("categories", 'categories.id', '=', 'products.catid')
            ->get();

        return $products;
    }

    public function storeOrder(Request $request)
    {

        Order::create([
            'buyerName' => request('buyerName'),
            'buyerLastName' => request('buyerLastName'),
            'buyerAddress' => request('buyerAddress'),
            'productID' => request('productID'),
            'productQuantity' => request('productQuantity'),
            'orderSum' => request('orderSum')
        ]);

        return response($request);
    }

    public function get_products_by_id($id)
    {

        return Product::find($id);
    }

}
