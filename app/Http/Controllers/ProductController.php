<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('pages.dashboard.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string',
        'price' => 'required|integer',
        'category' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,JPG,gif',
        'stock' => 'required|integer',
        'status' => 'required|string'
    ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('product_images', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
