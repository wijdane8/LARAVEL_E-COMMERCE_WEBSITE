<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productDetails;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function GetProducts()
    {
        $products=Product::all();
        $products_details=productDetails::all();
        return view('Dashboard.products',['products'=>$products, 'products_details'=>$products_details]);
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
    $product_details=productDetails::where('id',$request->id)->update([
        'ProductName' => $request -> ProductName,
        'color'=> $request -> color,
        'price'=> $request -> price,
        'qty'=> $request -> qty,
        'description'=> $request -> description,
        'productid'=> $request -> productid,
    ]);
    return redirect('/dashbaord/products');
}
public function search(Request $request)
{
    $query = $request->search;
    $products = Product::where('Productname', 'like', '%' . $query . '%')->get();

    // Retrieve other data as needed
    $products_details = productDetails::all();

    // Pass the data to the view
    return view('Dashboard.products', [
        'products' => $products,
        'products_details' => $products_details
    ]);
}
}
