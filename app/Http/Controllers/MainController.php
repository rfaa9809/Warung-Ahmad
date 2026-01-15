<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function index() {
        $products = Product::all();
        
        return view('pages.main.index', compact('products'));

    }
}
