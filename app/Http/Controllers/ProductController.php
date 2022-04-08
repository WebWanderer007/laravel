<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Device;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        #Using Query Builder
        // return DB::table('youtube.products')->get();
        // return DB::connection('mysql2')->table('products')->get();

        #Using Model
        return Product::all();
    }
}