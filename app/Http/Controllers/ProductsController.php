<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($cat, $product_id){
        $item = Product::where('id',$product_id)->first();

        return view('show', [
           'item' => $item
        ]);
    }

    public function showCategory($cat_alias, Request $request)
    {
        $cat = Category::where('alias', $cat_alias)->first();

        $products = Product::where('category_id', $cat->id);

        if ($request->order) {
            if ($request->order == 1) {
                $products->orderBy('title');
            } elseif ($request->order == 2) {
                $products->orderBy('title', 'desc');
            } elseif ($request->order == 3) {
                $products->orderBy('price');
            } elseif ($request->order == 4) {
                $products->orderBy('price', 'desc');
            }
        } else {
            $products->orderBy('title');
        }

        return view('categories', [
            'cat' => $cat,
            'products' => $products->get(),
        ]);
    }
}
