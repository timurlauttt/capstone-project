<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function update(User $user, Product $product)
    {
        // Allow if user is the owner OR user is a farmer role
        return $user->id === $product->user_id || $user->role === 'farmer';
    }

    public function delete(User $user, Product $product)
    {
        // Allow if user is the owner OR user is a farmer role
        return $user->id === $product->user_id || $user->role === 'farmer';
    }
}
