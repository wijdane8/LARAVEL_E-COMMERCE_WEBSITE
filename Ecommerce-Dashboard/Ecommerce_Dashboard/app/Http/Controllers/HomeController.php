<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productDetails;
use App\Models\product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function getIcedCoffee()
    {
        $response=HTTP::get('https://api.sampleapis.com/coffee/iced');
        return view('coffee',['data' => $response->object()]);
    }
    public function GetUsersAPI()
    {
      $apiURL = 'https://jsonplaceholder.typicode.com/users';
      $headers = [
        'Content-Type' => 'application/json',
      ];
      $response = Http::withHeaders($headers)->get($apiURL, [
        'email' => 'Sincere@april.biz',
    ]);
    $data = $response->json();
    
    return Response()->json($data);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products_details = productDetails::take(4)->get();
        return view('home',['products'=>$products_details]);
    }
    
    public function getProducts($category)
    {
       
            if ($category && $category != 'all') {
                $products_details = productDetails::where('category', $category)->get();
            } else {
                $products_details = productDetails::all(); // Retrieve all products if category is "all" or not specified
            }
        return view('products',['products'=>$products_details]);
    }
}
