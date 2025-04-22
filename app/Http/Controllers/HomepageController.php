<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Product::all();

        return view('web.homepage', [
            'categories' => $categories,
            'title' => 'Homepage',
        ]);
    }

    public function products()
    {
        return view('web.products');
    }

    public function product($slug)
    {
        return view('web.product', ['slug' => $slug]);
    }

    public function categories()
    {
        $categories = ProductCategory::all();

        return view('web.categories', [
            'categories' => $categories,
            'title' => 'Kategori Produk',
        ]);
    }

    public function category($slug)
    {
        return view('web.category_by_slug', ['slug' => $slug]);
    }

    public function cart()
    {
        return view('web.cart');
    }

    public function checkout()
    {
        return view('web.checkout');
    }
}
