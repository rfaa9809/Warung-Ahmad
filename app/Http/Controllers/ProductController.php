<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'price' => 'required|integer',
                'category' => 'required|string',
                'description' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif',
                'stock' => 'required|integer',
                'status' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            // Loop through all validation errors and trigger a toast for each
            foreach ($e->errors() as $error) {
                ToastMagic::error($error[0]);
            }

            // Throw the exception again so Laravel handles the redirect and old input
            throw $e;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product_images', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);

        ToastMagic::success('Berhasil menambahkan produk!');
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
    public function edit(Product $product)
    {
        // Pass the product instance to the edit view
        return view('pages.dashboard.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'price' => 'required|integer',
                'category' => 'required|string',
                'description' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif',
                'stock' => 'required|integer',
                'status' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $error) {
                ToastMagic::error($error[0]);
            }
            throw $e;
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('product_images', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        ToastMagic::success('Berhasil mengupdate produk: ' . $product->name);
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        ToastMagic::success('Berhasil menghapus produk: ' . $product->name);

        return to_route('products.index')->with('success', 'Product deleted successfully!');
    }
}
