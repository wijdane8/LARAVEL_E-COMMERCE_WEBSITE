@extends('layouts.app')

@section('content')
<style>
    .lightbox-gallery {
        background-image: linear-gradient(#4A148C, #E53935);
        background-repeat: no-repeat;
        color: #000;
        overflow-x: hidden
    }

    .lightbox-gallery p {
        color: #fff
    }

    .lightbox-gallery h2 {
        font-weight: bold;
        margin-bottom: 40px;
        padding-top: 40px;
        color: #fff
    }

    @media (max-width: 767px) {
        .lightbox-gallery h2 {
            margin-bottom: 25px;
            padding-top: 25px;
            font-size: 24px
        }
    }

    .lightbox-gallery .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 40px
    }

    .lightbox-gallery .intro p {
        margin-bottom: 0
    }

    .lightbox-gallery .photos {
        padding-bottom: 20px
    }

    .lightbox-gallery .item {
        padding-bottom: 30px
    }

    .product-image {
        width: 80%;
        height: 80px;
        /* Set the desired height */
        object-fit: cover;
        /* Make sure images fill the container */
    }

    .product-thumbnail-image {
        width: 100%;
        height: 200px;
        /* Set the desired height */
        object-fit: contain;
        /* Make sure images fill the container */
        background-color: rgb(250, 249, 249);
    }
</style>
<div class="container mt-5 mb-5">
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
                <div class="col-md-2 mt-2 mb-2 "><img class="img-fluid img-responsive rounded product-image img-thumbnail product-thumbnail-image" src="{{ $product['thumbnail']}}"></div>
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
<div class="py-5 text-right">
 <nav aria-label="Page navigation example">
    <ul class="pagination text-center justify-content-center">
        @php
            $totalPages = 0;
            if ($products !== null) {
                $totalPages = ceil(count($products) / $productsPerPage);
            }
        @endphp

        @for($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
</nav>

          </div>
@endsection