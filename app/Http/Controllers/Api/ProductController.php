<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //function index
    public function index(Request $request){
        $product=Product::all();
        return response($product);
    }
}
