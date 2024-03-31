<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productDetails;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getProducts()
    {
        $products_details=productDetails::all();
        return view('products',['products'=>$products_details]);
    }
}
