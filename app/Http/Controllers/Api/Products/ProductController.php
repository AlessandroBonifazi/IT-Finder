<?php

namespace App\Http\Controllers\Api\Products;

use App\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request){
        $promos = Promo::all();
        return ProductResource::collection($promos);
    }
}
