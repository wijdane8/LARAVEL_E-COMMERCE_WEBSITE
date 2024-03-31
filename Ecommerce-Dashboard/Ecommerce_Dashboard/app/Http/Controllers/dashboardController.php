<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productDetails;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function unpack_DB()
{
    $products = json_decode(Storage::get('public/data copy.json'));

    try {
        foreach ($products as $product) {
            $images = []; // Initialize an empty array to store images
        
            foreach ($product->images as $image) {
                $images[] = $image; // Add each image to the $images array
            }

            // Create a new Product model and save it to the database
            $new_product = Product::create([
                'ProductName' => $product->name,
            ]);
        
            // Create a new ProductDetails model and save it to the database
            $product_details = ProductDetails::create([
                'ProductName' => $product->name,
                'price' => $product->price,
                'qty' => $product->stock,
                'brand' => $product->brand,
                'discountPercentage' => $product->discountPercentage,
                'rate' => $product->rating,
                'category' => $product->category,
                'description' => $product->description,
                'productid' => $new_product->id,
                'thumbnail' => $product->thumbnail,
                'images' => json_encode($images), // Serialize images array before storing
            ]);
        
            $product_details->save(); // Save the ProductDetails model
        }
    } catch (\Exception $e) {
        // Handle any exceptions, such as database errors, file not found, etc.
        return redirect()->back()->with('error', 'An error occurred while unpacking the database.');
    }
    return redirect('/dashbaord/products');;
}


    public function logout(request $request)
    {
        Auth::logout();

    $request->session()->invalidate(); // Invalidate the user's session

    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect('/login');

    }
    public function index()
    {
        return view('Dashboard.index');
    }
    public function GetProducts(Request $request)
    {
        $category_list = ['Electronics', 'Fashion', 'Home & Garden', 'Electronics', 'Beauty'];
        $query = $request->search;
        
        // Apply search query and paginate results
        $productsQuery = productDetails::where('Productname', 'like', '%' . $query . '%');
        $products = $productsQuery->paginate(6);
        
        // If no search results found, paginate all products
        if($products->isEmpty() && $query) {
            $products = productDetails::paginate(6);
        }
        
        // Preserve search query in pagination links
        $products->appends(['search' => $query]);
        
        return view('Dashboard.products', ['products_details' => $products, 'category_list' => $category_list]);
    }
 
    public function createProduct(request $request)
    {
        
        $product=Product::create([
            'ProductName' => $request -> ProductName,
        ]);
        $product->save();
        $product_details=productDetails::create([
            'ProductName' => $request -> ProductName,
            'color'=>'color',
            'price'=>0,
            'qty'=> 0,
            'description'=> '',
            'productid'=> $product['id'],
        ]);
        $product_details->save();
        return redirect('/dashbaord/products');

    }
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        productDetails::where('productid', $id)->delete();
        return redirect('/dashbaord/products');
    }
    public function editProduct(request $request)
    {
        $product=Product::where('id',$request->id)->update([
            'ProductName' => $request->ProductName,
        ]);
        return redirect('/dashbaord/products');
    }

    public function updateProductDetails(request $request)
    {
        $vaidated = $request->validate([
            'price'=>'required',
            'discountPercentage'=>'integer',
            'ProductName' => 'required|string',
            'color'=> 'string',
            'price'=> 'integer',
            'qty'=> 'integer',
            'brand'=> 'string|nullable',
            'discountPercentage'=> 'numeric|nullable',
            'category'=> 'string',
            'description'=> 'string',

        ]);
    $product_details=productDetails::where('id',$request->id)->update([
        'ProductName' => $request -> ProductName,
        'color'=> $request -> color,
        'price'=> $request -> price,
        'qty'=> $request -> qty,
        'brand'=> $request -> brand,
        'discountPercentage'=> $request -> discountPercentage,
        'category'=> $request -> category,
        'description'=> $request -> description,
        'id'=> $request -> id,
        'productid'=> $request -> productid,
    ]);
    return redirect('/dashbaord/products');
}

}
