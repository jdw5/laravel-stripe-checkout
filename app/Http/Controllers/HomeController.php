<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class HomeController extends Controller
{
    public function index() 
    {

        $products = ProductResource::collection(Product::get());

        return Inertia::render('Home', [
            'products' => $products,

        ]);
    }
}
