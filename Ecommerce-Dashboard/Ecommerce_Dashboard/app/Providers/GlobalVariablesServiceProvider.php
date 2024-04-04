<?php

// app/Providers/GlobalVariablesServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalVariablesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
                $userId = Auth::id();

        // Retrieve cart items count for the current user
        $cartItemsCount = Cart::where('userid', $userId)->count();

        // Set a global variable
        config(['global.cartItems' => $cartItemsCount]);
    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
