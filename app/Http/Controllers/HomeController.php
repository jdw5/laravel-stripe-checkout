<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {

        $products = Product::get();

        return Inertia::render('Home', [
            'products' => $products,

        ]);
    }
}
