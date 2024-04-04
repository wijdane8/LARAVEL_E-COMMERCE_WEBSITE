@extends('layouts.app')

@section('content')
        @section('header')
            <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active row" style="background-color: rgb(239, 245, 224);">
                    <div class="row " >
                        <div class="col-5 mt-5">
                            <h1 class="text-success text-center animate__animated animate__pulse animate__infinite" style="font-size:10rem;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 400;">
                                50 % SALES
                            </h1>
                        </div>
                        <div class="col pt-5 mt-5">
                            <h1 class="pt-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h1>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam repellat, magnam ratione ullam quibusdam repudiandae assumenda reiciendis! Commodi hic veritatis quod officia quis incidunt suscipit nam, voluptate ea dicta at!</p>
                            <div class="text-end p-5">
                            <button class="btn btn-danger mt-5 ">SHOP NOW!</button>
                        </div>
                        </div>
                    </div>
        
                </div>
                  <div class="carousel-item " style="background-color: rgb(249, 240, 255);">
                    <div class="row" >
                        <img src="/images/world-map-png-35420.png" class="col mt-5" alt="" >
                        <div class="col pt-5 mt-5">
                            <h1 class="text-center " style="font-size:2rem;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight:bold;color: rgb(136, 103, 168);">
                                SHIPPING AROUND THE WORLD
                            </h1>
                            <h1 class="pt-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h1>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam repellat, magnam ratione ullam quibusdam repudiandae assumenda reiciendis! Commodi hic veritatis quod officia quis incidunt suscipit nam, voluptate ea dicta at!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item pt-5 ps-5" style="background-color: aliceblue;">
                    <img src="/images/bag-png-33948.png" alt="" height="300" class="mt-5 ms-5">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        @endsection

        
        
        
          
          
          <main class="container row mb-5"  style=" overflow-x: scroll;white-space: nowrap;display:flex;flex-direction: row;" >
            <style>.product-grid{
                font-family: 'Poppins', sans-serif;
                text-align: center;
            }
            .product-grid .product-image{
                overflow: hidden;
                position: relative;
                z-index: 1;
            }
            .product-grid .product-image a.image{display: block; }
            .product-grid .product-image img{
                width: 100%;
                height: 15rem;
                object-fit: cover;
            }
            .product-grid .product-discount-label{
                color: #fff;
                background: #A5BA8D;
                font-size: 13px;
                font-weight: 600;
                line-height: 25px;
                padding: 0 20px;
                position: absolute;
                top: 10px;
                left: 0;
            }
            .product-grid .product-links{
                padding: 0;
                margin: 0;
                list-style: none;
                position: absolute;
                top: 10px;
                right: -50px;
                transition: all .5s ease 0s;
            }
            .product-grid:hover .product-links{ right: 10px; }
            .product-grid .product-links li a{
                color: #333;
                background: transparent;
                font-size: 17px;
                line-height: 38px;
                width: 38px;
                height: 38px;
                border: 1px solid #333;
                border-bottom: none;
                display: block;
                transition: all 0.3s;
            }
            .product-grid .product-links li:last-child a{ border-bottom: 1px solid #333; }
            .product-grid .product-links li a:hover{
                color: #fff;
                background: #333;
            }
            .product-grid .add-to-cart{
                background: #A5BA8D;
                color: #fff;
                font-size: 16px;
                text-transform: uppercase;
                letter-spacing: 2px;
                width: 100%;
                padding: 10px 26px;
                position: absolute;
                left: 0;
                bottom: -60px;
                transition: all 0.3s ease 0s;
            }
            .product-grid:hover .add-to-cart{ bottom: 0; }
            .product-grid .add-to-cart:hover{ text-shadow: 4px 4px rgba(0,0,0,0.2); }
            .product-grid .product-content{
                background: #fff;
                padding: 15px;
                box-shadow: 0 0 0 5px rgba(0,0,0,0.1) inset;
            }
            .product-grid .title{
                font-size: 16px;
                font-weight: 600;
                text-transform: capitalize;
                margin: 0 0 7px;
            }
            .product-grid .title a{
                color: #777;
                transition: all 0.3s ease 0s;
            }
            .product-grid .title a:hover{ color: #a5ba8d; }
            .product-grid .price{
                color: #0d0d0d;
                font-size: 14px;
                font-weight: 600;
            }
            .product-grid .price span{
                color: #888;
                font-size: 13px;
                font-weight: 400;
                text-decoration: line-through;
            }
            @media screen and (max-width: 990px){
                .product-grid{ margin-bottom: 30px; }
            }</style>
            
                      
            <div class="col-12 row pt-5 ">
                          @foreach($products as $product)
                          <div class="col-md-3 col-sm-6 mb-3">
                              <div class="product-grid">
                        <div class="product-image border">
                            <a href="#" class="image">
                                <img src="{{$product['thumbnail'] }}">
                            </a>
                            <span class="product-discount-label">{{$product['discountPercentage'] }}%</span>
                            <ul class="product-links">
                                <li><a href="#"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                            <a href="" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">{{ $product['ProductName'] }}</a></h3>
                            @if($product['discountPercentage']==0)<div class="price" >${{$product['price']}}</div>
                            @else
                            <div class="price">${{$product['price'] - ($product['price'] * ($product['discountPercentage'] / 100))}}<span>  ${{$product['price']}}</span></div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                        @endforeach
            </div>
            </main>
            <hr>
            <style>
            .card1 {
                text-transform: uppercase;
                text-align: center;
                color: #ffffff;
                background-color: #f8c0b8;
            }
            
            .card2 {
                margin-bottom: 20px;
                padding-bottom: 40px;
            }
            
            .bg-black {
                background-color: #000000;
            }
            
            #summer {
                font-weight: normal;
                font-size: 50px;
                padding-top: 50px;
                margin-bottom: 0;
                transform: scale(1, 1.3);
                color: #FF5252;
                opacity: 0.8;
            }
            
            #sale {
                font-weight: normal;
                font-size: 70px;
                transform: scale(1.2, 1.2);
                letter-spacing: 8px;
                padding-left: 4px;
                color: #FF5252;
                opacity: 0.8;
            }
            
            #saveupto {
                color: #35b3a2;
                letter-spacing: 10px;
                transform: scale(1, 1);
                font-size: 20px;
                margin-top: 40px;
                padding-left: 6px;
            }
            
            #thirty {
                font-size: 70px;
                transform: scale(1.2, 1.5);
            }
            
            #percent {
                font-weight: normal;
                font-size: 34px;
                margin-bottom: 0;
                padding-left: 10px;
                transform: scale(1.8, 1.6);
            }
            
            #off {
                font-size: 35px;
                transform: scale(1.2, 1);
                padding-left: 0px;
            }
            
            @media (max-width: 768px) {
                #percent {
                    padding-left: 5px;
                }
            
                #off {
                    padding-left: 0px;
                    transform: scale(1.1, 1);
                    font-size: 30px;
                }
            }
            
            #instore {
                border-top: 1px solid grey;
                border-bottom: 1px solid grey;
                background-color: #f4f2b985;
                padding-bottom: 4px;
                padding-top: 4px;
                color: rgb(81, 170, 163);
                margin-bottom: 80px;
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .bg-white {
                background-color: #ffffff;
            }
            
            .subhead1 {
                text-transform: uppercase;
                font-size: 18px;
                padding-top: 70px;
            }
            
            .subhead2 {
                color: #00BFA5;
                font-weight: normal;
                font-size: 25px;
                padding-top: 30px;
                padding-bottom: 30px;
            }
            
            input.input-box, textarea.input-box {
                background-color : #CFD8DC;
                color: #212121;
                font-size: 15px;
                padding: 15px auto 15px auto !important;
                height: 55px !important;
                text-align: center;
            }
            
            input.input-box:focus, textarea.input-box:focus {
                color: #212121;
                background-color: #ECEFF1;
                box-shadow: 0 0 1px 1px #CFD8DC;
            }
            
            .rm-border:focus {
                border-color: inherit;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            
            form .form-control::-webkit-input-placeholder { 
                  color: #9E9E9E;
            }
            
            ::-moz-placeholder {
                  color: #9E9E9E !important;
            }
            
            input.btn-red {
                background-color: #d50000dd;
                padding-left: 0px;
                padding-right: 0px;
                color: #ffffff;
                font-weight: bold;
                height: 55px;
                opacity: 0.8;
            }
            
            input.btn-red:hover {
                opacity:1;
            }
            
            .thanks {
                color: #000000 !important;
                text-align: center;
                text-transform: uppercase;
                padding-bottom: 10px;
            }
            
            .thanks:hover {
                color: #000000 !important;
                text-decoration: underline;
                padding-bottom: 10px;
            }
            
            .conditions {
                font-size: 12px;
                color: #546E7A;
                text-align: center;
            }</style>
            <div class="">
                <div class="container-fluid mt-5 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 px-0 pb-4">
                            <div class="container-fluid rounded-0 border mt-4 bg-light">
                                <div class="row">
                                    <div class="col-md-4 " style="background-color: #22ae9b;">
                                        <div class="card rounded-0 border-0 card1">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 col-10">
                                                    <h2 id="summer">summer</h2>
                                                </div>
                                                <div class="col-md-12 col-10">
                                                    <h2 id="sale">sale</h2>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 col-10">
                                                    <h2 id="saveupto">save up to</h2>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-11">
                                                    <div class="row justify-content-left">
                                                        <div class="col-md-6 col-6 text-right">
                                                            <h2 id="thirty" class="">30</h2>
                                                        </div>
                                                        <div class="col-1 px-0"></div>
                                                        <div class="col-4 text-left">
                                                            <div class="row d-flex">
                                                                <p id="percent">%</p>
                                                            </div>
                                                            <div class="row d-flex">
                                                                <p id="off">OFF</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <p id="instore">in stores & online</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 bg-white">
                                        <form class="">
                                            <div class="card rounded-0 border-0 card2">
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        <h4 class="subhead1 text-center">enter your email below to unlock</h4>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        <h3 class="subhead2 text-center">where should we send your 30% off?</h3>
                                                    </div>
                                                </div>
            
                                                <div class="row justify-content-center">
                                                    <div class="col-md-10 col-11">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="email" type="email" placeholder="Email your email here" class="form-control input-box rm-border">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                              <div class="col-md-12">
                                                                <input type="submit" value="GET MY $10 OFF" class="btn btn-red rm-border btn-block">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row justify-content-center mb-0">       
                                                            <div class="col-md-12 px-3 mt-4">
                                                                  <a href="#"><p class="thanks">no thanks</p></a>
                                                            </div>
                                                        </div>
            
                                                        <div class="form-group row justify-content-center mb-0">       
                                                            <div class="col-md-10 px-3">
                                                                  <p class="conditions">First time registereants only. *$10 off on $25+ orders, and entering your email also makes you eligible to receive future promotional emails.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <script>
    JavaScript

// Initialization for ES Users
import { Dropdown, Collapse, initMDB } from "mdb-ui-kit";

initMDB({ Dropdown, Collapse });</script>


@endsection
