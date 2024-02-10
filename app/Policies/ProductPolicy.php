<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy extends ModelPolicy
{

    public function view($user, Product $product)
    {
        return $user->hasAbility('products.view');
    }
}
