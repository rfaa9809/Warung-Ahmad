<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Assuming 10% tax rate - adjust as needed
        $taxRate = 0.1;
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

        $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->delete();
            ToastMagic::info('Produk dihapus dari keranjang: ', $product->name);
            return back()->with('success', 'Item removed from cart');
        }

        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        ToastMagic::success('Berhasil menambahkan produk ke keranjang: ', $product->name);
        return back()->with('success', 'Item added to cart!');
    }

    public function increase($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);

        $cartItem->increment('quantity');

        return back();
    }

    public function decrease($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return back();
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart');
    }

    public function checkout()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        try {
            DB::transaction(function () use ($cartItems) {
                foreach ($cartItems as $item) {
                    $product = $item->product;

                    if ($product->stock < $item->quantity) {
                        throw new \Exception("Insufficient stock for {$product->name}");
                    }

                    $product->decrement('stock', $item->quantity);
                }

                CartItem::where('user_id', Auth::id())->delete();
            });

            ToastMagic::success('Checkout berhasil');
            return to_route('cart.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
