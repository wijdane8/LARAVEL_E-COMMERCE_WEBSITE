@extends('layouts.app')

@section('content')
@foreach($data as $item)
<ul>
    <li>{{ $item->title }}</li>
    <li>{{ $item->description }}</li>
    <li>@foreach ($item->ingredients as $ing)
        {{$ing}} 
        @endforeach
    </li>
    <li>
        <img src="{{$item->image}}" alt="" hight=200 width=200>
        </li>
</ul>
@endforeach
@endsection


<main class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
        @php
          $productsPerPage = 6; // Adjust this number according to your pagination requirements
          $currentPage = request()->get('page', 1);
          $offset = ($currentPage - 1) * $productsPerPage;
          $productsArray = $products->toArray();
          $paginatedProducts = array_slice($productsArray, $offset, $productsPerPage);
          @endphp
          
          @foreach($paginatedProducts as $product)
            <div class="row align-items-center bg-white border rounded mb-5">
                <div class="carousel slide col-md-2" data-ride="carousel" id="carousel">
                    <div class="carousel-inner" role="listbox">
                    @foreach(json_decode($product['images']) as $index => $image)
                <div class="carousel-item active"><img class="img-thumbnail " src="{{$image}}" alt="Slide Image" loading="lazy"></div>
                @endforeach
            </div>
            <div><a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active" ></li>
              
            </ol>`
        </div>
                <div class="col-md-8 mt-1 justify-content-center">
                    <div class="p-3 ms-5 mb-3">
                        <div class="row justify-content-around align-items-center  ">
                            <div class="col  ">
                                <h6 class="">{{$product['brand'] }}</h6>
                                <h5 class="text-capitalize">{{ $product['ProductName'] }}</h5>
                            </div>
                            <h6 class="border border-2 border-danger-subtle bg-light shadow-sm rounded col-2  text-center me-3 text-capitalize p-1">{{$product['category']}}</h6>
                        </div>
                        <p class="text-justify  para mb-1 ">{{$product['description']}}</p>
                    </div>
                    <div class="row photos align-items-center justify-content-center mb-3 ">
                        @foreach(json_decode($product['images']) as $index => $image)
                        <!-- Image Thumbnail -->
                        <!-- Image Thumbnail -->
                        <div class="col-sm-5 col-md-3 col-lg-2 item p-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#imgmodal{{$index}}{{$product['id']}}">
                                <img class="img-fluid rounded-1 border-0 shadow-sm product-image" src="{{ $image }}" width="90%">
                            </a>
                        </div>
                    
                        <!-- Modal for Image {{$index}} -->
                        <div class="modal fade" id="imgmodal{{$index}}{{$product['id']}}" tabindex="-1" aria-labelledby="imgmodalLabel{{$index}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imgmodalLabel{{$index}}">Image Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body justify-content-center">
                                        <img src="{{ $image }}" class="img-fluid" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    
                    
                    </div>
                </div>
                <div class="align-items-center justify-content-center col-md-2 border-left mt-1  ">
                    <div class="d-flex flex-row align-items-center mt-2">
                        
                        <h5 class="mr-1">Rating: <p class="badge bg-warning">{{$product['rate']}}</p></h5>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1 ">${{$product['price'] - ($product['price'] * ($product['discountPercentage'] / 100))}}</h4>
                        <h6 class="mr-1 ms-2"><del>${{$product['price']}}</del></h6><h5 class="text-success ms-1"><sup>{{$product['discountPercentage'] }}%</sup></h5>
                    </div>
                    <span class="mb-1 strike-text text-capitalize @if($product['qty'] <= 0) text-secondary @elseif($product['qty'] <= 5 && $product['qty'] > 0) text-danger @else text-success @endif">
    @if($product['qty'] == 0)
        <del class="text-secondary">out of stock</del>
    @elseif ($product['qty'] >= 6)
        {{ $product['qty'] }} in stock
    @else
        only {{ $product['qty'] }} left
    @endif
</span>

                    <h6 class="text-capitalize">Free shipping</h6>
                    <div class="d-flex flex-column mt-4 mb-2"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
