<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Product;
use App\Models\Applicaion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function sendCart(Request $request)
    {
        $cart = json_decode($request->cookie('cart'), true);
        $application = Application::create([
            'user_id' => Auth::user()->id,
            'status_id' => 0,
        ]);

        $products = Product::whereIn('id', array_keys($cart))->get()->map(function ($product) use ($cart) {
            $product['cart_count'] = $cart[$product->id];
            $product['cart_price'] = $product->price * $product->cart_count;
            return $product;
        });

        foreach ($products as $product) {
            $application->products()->attach($product->id, ['count' => $product['cart_count']]);
        }

        Cookie::queue(Cookie::forget('cart'));

        return redirect('/profile/cart');
    }

    public function showCart(Request $request)
    {
        $cart = json_decode($request->cookie('cart'), true);
        $products = null;
        if ($cart) {
            $products = Product::whereIn('id', array_keys($cart))->get()->map(function ($product) use ($cart) {
                $product['cart_count'] = $cart[$product->id];
                $product['cart_price'] = $product->price * $product->cart_count;
                return $product;
            });
        }

        return view('cart', [
            'products' => $products,
        ]);
    }

    public function addCartApi(Product $product, Request $request)
    {
        if (!$product) {
            abort(404);
        }
        $cart = json_decode($request->cookie('cart'), true);
        if (!$cart) {
            $cart = [$product->id => 1];
            return response([
                'status' => true,
                'product' => $product,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }
        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
            session()->put('cart', $cart);
            return response([
                'status' => true,
                'product' => $product,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }

        $cart[$product->id] = 1;
        session()->put('cart', $cart);
        return response([
            'status' => true,
            'product' => $product,
        ])->withCookie(cookie(
            'cart', json_encode($cart), 60
        ));
    }

    public function editCartApi(Product $product, $count, Request $request)
    {
        if (!$product) {
            abort(404);
        }
        $cart = json_decode($request->cookie('cart'), true);
        if (!$cart) {
            $cart = [$product->id => $count];
            return response([
                'status' => true,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }
        if (isset($cart[$product->id])) {
            $cart[$product->id] = $count;
            session()->put('cart', $cart);
            return response([
                'status' => true,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }

        $cart[$product->id] = $count;
        session()->put('cart', $cart);
        return response([
            'status' => true,
        ])->withCookie(cookie(
            'cart', json_encode($cart), 60
        ));
    }

    public function delCartApi(Product $product, Request $request)
    {
        if (!$product) {
            abort(404);
        }
        $cart = json_decode($request->cookie('cart'), true);

        if (!$cart) {
            $cart = [$product->id => 1];
            return response([
                'status' => true,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }
        if (isset($cart[$product->id])) {
            if ($cart[$product->id] == 1) {
                unset($cart[$product->id]);
            } else {
                $cart[$product->id]--;
            }
            return response([
                'status' => true,
            ])->withCookie(cookie('cart', json_encode($cart), 60));
        }

        unset($cart[$product->id]);
        return response(['status' => true,])->withCookie(cookie(
            'cart', json_encode($cart), 60
        ));
    }

    public function clearCartApi(Product $product, Request $request)
    {
        if (!$product) {
            abort(404);
        }
        $cart = json_decode($request->cookie('cart'), true);

        if (!$cart) {
            $cart = [$product->id => 1];
            return response([
                'status' => true,
            ])->withCookie(cookie(
                'cart', json_encode($cart), 60
            ));
        }
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);

            return response([
                'status' => true,
            ])->withCookie(cookie('cart', json_encode($cart), 60));
        }

        unset($cart[$product->id]);
        return response(['status' => true,])->withCookie(cookie(
            'cart', json_encode($cart), 60
        ));
    }
}
