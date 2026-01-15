<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function product() {
        return $this->BelongsTo(Product::class);
    }
}
