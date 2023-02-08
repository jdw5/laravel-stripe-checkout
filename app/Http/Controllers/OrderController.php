<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $orders = $request->user()->orders()->with('products')->get();

        return Inertia::render('Orders', [
            'orders' => $orders
        ]);
    }
}
