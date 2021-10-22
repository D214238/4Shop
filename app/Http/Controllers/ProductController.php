<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Order_rule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)->get();
        $categories = Category::where('active', true)->get();
        return view('products.index')
                ->with(compact('products'))->with(compact('categories'));
    }

    public function show(Product $product)
    {
        return view('products.show')
                ->with(compact('product'));
    }

    public function category(Category $category)
    {
        $products = $category->products->where('active', true)->all();
        return view('products.index')
                ->with(compact('products'));
    }

    public function order(Product $product, Request $request)
    {
        $rule = new Order_rule();
        $rule->product = $product;
        $rule->type = $request->type;
        $rule->size = $request->size;

        $request->session()->push('cart', $rule);
        return redirect()->route('cart');
    }
}
