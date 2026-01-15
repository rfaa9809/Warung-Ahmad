<?php

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = WishlistItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('pages.wishlist.index', [
            'wishlistItems' => $wishlistItems
        ]);
    }

    public function addToWishlist($productId)
    {
        $product = Product::findOrFail($productId);

        WishlistItem::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);

        return back()->with('success', 'Item added to wishlist!');
    }

    public function remove($id)
    {
        $wishlistItem = WishlistItem::where('user_id', Auth::id())
            ->findOrFail($id);

        $wishlistItem->delete();

        return back()->with('success', 'Item removed from wishlist');
    }

    public function moveToCart($id)
    {
        $wishlistItem = WishlistItem::with('product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        // Add to cart (using your existing CartController logic)
        // You might want to use dependency injection instead
        app(CartController::class)->addToCart($wishlistItem->product_id);

        $wishlistItem->delete();

        return back()->with('success', 'Item moved to cart!');
    }
}