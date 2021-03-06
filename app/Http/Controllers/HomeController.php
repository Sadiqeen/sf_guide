<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $product = new Product;

        if ($request->query('search')) {
            $products = $product->where('title', 'like', '%' . $request->query('search') . '%')->paginate(10);
        } else {
            $products = $product->paginate(10);
        }
        // dd($products->toArray());
        return view('home', [
            'products' => $products
        ]);
    }
}
