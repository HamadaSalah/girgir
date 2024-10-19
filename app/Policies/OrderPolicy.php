<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        return $user->id == $order->user_id || $user->role == 'admin';
    }



    /**
     * Determine whether the user can view the model.
     */
    public function viewforProvider(Provider $provider, Order $order): bool
    {
        return $provider->id == $order->provider_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Provider $provider, Order $order): bool
    {
        return $provider->id == $order->provider_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Provider $provider, Order $order): bool
    {
        return $provider->id == $order->provider_id || $provider->role == 'admin';
    }

}
