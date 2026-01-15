<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Assuming 10% tax rate - adjust as needed
        $taxRate = 0.10;
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        return view('pages.cart.index', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        CartItem::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $productId],
            ['quantity' => DB::raw('quantity + 1')]
        );

        return back()->with('success', 'Item added to cart!');
    }

    public function increase($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->findOrFail($id);

        $cartItem->increment('quantity');

        return back();
    }

    public function decrease($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return back();
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->findOrFail($id);

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart');
    }

    public function checkout()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        // Here you would typically:
        // 1. Create an order
        // 2. Process payment
        // 3. Clear the cart
        // 4. Send confirmation

        // For now, we'll just clear the cart
        CartItem::where('user_id', Auth::id())->delete();

        return to_route('main.index')->with('success', 'Order placed successfully!');
    }
}