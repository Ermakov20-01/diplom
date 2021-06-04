<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showMain()
    {
        $products = Product::orderBy('created_at')->take(8)->get();
        $categories = Category::all();
        $favorite_categories = Category::inRandomOrder()->take(3)->get();
        $brands = Brand::all();

        return view('index', [
            'products' => $products,
            'categories' => $categories,
            'favorite_categories' => $favorite_categories,
            'brands' => $brands,
        ]);
    }

    public function showBrand(Brand $brand)
    {
        return view('brand', [
            'brand' => $brand,
        ]);
    }

    public function showSearch(Request $request)
    {
        $products = Product::where('title', 'like', '%'.$request->text.'%')
            ->orWhere('description', 'like', '%'.$request->text.'%')
            ->get();

        return view('search', [
            'search' => $request->text,
            'products' => $products,
        ]);
    }

}
