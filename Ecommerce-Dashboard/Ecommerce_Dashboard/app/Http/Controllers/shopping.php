<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\productDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class shopping extends Controller
{
    public function addCart(Request $request, $id)
{
    try {
        $productId = $request->id; // Retrieve the product ID from the request

        $product = productDetails::findOrFail($productId);

        // Check if the product already exists in the cart for the current user
        $existingCartEntry = Cart::where('productid', $productId)
                                 ->where('userid', auth()->id())
                                 ->first();

        if ($existingCartEntry) {
            // If the product already exists, update the quantity and total
            $existingCartEntry->qty += $request->qty; // Increment the quantity
            $existingCartEntry->total = $product->price * $existingCartEntry->qty *
                                        (1 - ($existingCartEntry->discount / 100)) * (1 + ($existingCartEntry->tax / 100));
            $existingCartEntry->save();
        } else {
            // Calculate total price
            $price = $product->price; // Use the correct variable name for price
            $qty = $request->qty; // Use the quantity from the request
            $discountPercentage = $product->discountPercentage; // Assuming `getDiscountPercentage` is a method, adjust if needed
            $taxPercentage = 5; // Assuming a fixed tax percentage of 5%
            $total = ($price * $qty) * (1 - ($discountPercentage / 100)) * (1 + ($taxPercentage / 100));
        
            // Create Cart entry
            $cart = Cart::create([
                'ProductName' => $product->ProductName, // Assuming the product name is directly accessible
                'productid' => $productId, // Use the product ID from the request
                'qty' => $qty, // Use the quantity from the request
                'tax' => $taxPercentage,
                'discount' => $discountPercentage,
                'total' => $total,
                'net' => $total, // Assuming net is the same as total for now
                'userid' => auth()->id(), // Assuming you have user authentication and getting the current user's ID
            ]);
            $cartItemsCount = Cart::where('userid', auth()->id())->count();
            session(['cartItems' => $cartItemsCount]);
        }

        return redirect('/products/all');
    } catch (\Exception $e) {
        // Handle the exception (e.g., show an error message or redirect)
        return redirect()->back()->with('error', 'Failed to add product to cart: ' . $e->getMessage());
    }
}


    
public function deleteCart($id)
{
    try {
        // Find the cart item to delete
        $cartItem = Cart::findOrFail($id);

        // Delete the cart item
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    } catch (\Exception $e) {
        // Handle the exception (e.g., show an error message or redirect)
        return redirect()->back()->with('error', 'Failed to remove product from cart: ' . $e->getMessage());
    }
}
public function getCart()
{
    // Get the current user's ID
    $userId = Auth::id();

    // Retrieve cart products for the current user
    $cartProducts = Cart::where('userid', $userId)->get();
    $cartItems = DB::table('carts')
    ->join('product_details', 'carts.productid', '=', 'product_details.id')
    ->select(
        'carts.*', // Select all fields from the carts table
        'carts.qty as cart_qty', // Alias carts.qty as cart_qty
        'product_details.*', // Select all fields from the product_details table
        'carts.id as cart_id',
        'product_details.qty as product_qty' // Alias product_details.qty as product_qty
    )
    ->get();

    return view('shopping.cart',['products'=>$cartItems]);
}
public function productDetails($id)
    {
        try {
            // Fetch the product from the database by its ID
            $product = productDetails::findOrFail($id);

            // Pass the product data to the view
            return view('shopping.productDetails',['product'=>$product] );
        } catch (\Exception $e) {
            // Handle the exception (e.g., show an error message or redirect)
            return redirect()->back()->with('error', 'Product not found: ' . $e->getMessage());
        }
    }
  
}
