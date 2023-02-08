<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return Inertia::render('Product', [
            'product' => ProductResource::make($product)
        ]);
    }
}
