<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];
    public function product() {
        return $this->BelongsTo(Product::class);
    }
}
