<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;

class ProductController extends Controller
{
    public function index(Request $request){
        $promos = Promo::all();
        return response()->json($promos,200);
    }
}
