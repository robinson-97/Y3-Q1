<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebshopController extends Controller
{
    //
}

use App\Models\Product;

public function index()
{
    $products = Product::all(); // Fetch all 100 products
    return view('webshop', compact('products'));
}

