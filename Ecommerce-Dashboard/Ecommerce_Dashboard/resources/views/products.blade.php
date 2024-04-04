@extends('layouts.app')

@section('content')
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
    background: #f37b7b;
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
    color: #ed3636;
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
    background: #ed3636;
}
.product-grid .add-to-cart{
    background: #93d4be;
    color: #fff;
    text-decoration: none;
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
    box-shadow: 0 0 0 2px rgba(0,0,0,0.1) inset;
}
.product-grid .title{
    font-size: 16px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 7px;
}
.product-grid .title a{
    color: #878686;
    transition: all 0.3s ease 0s;
    text-decoration: none;
}
.product-grid .title a:hover{ color: #7ed4ac; }
.product-grid .price{
    color: #0d0d0d;
    font-size: 14px;
    font-weight: 600;
}
.product-grid .price span{
    color: #ff7a7a;
    font-size: 13px;
    font-weight: 400;
    text-decoration: line-through;
}
@media screen and (max-width: 990px){
    .product-grid{ margin-bottom: 30px; }
}</style>
@php
          $productsPerPage = 9; // Adjust this number according to your pagination requirements
          $currentPage = request()->get('page', 1);
          $offset = ($currentPage - 1) * $productsPerPage;
          $productsArray = $products->toArray();
          $paginatedProducts = array_slice($productsArray, $offset, $productsPerPage);
          @endphp
          
          <div class="row pt-5">
              @foreach($paginatedProducts as $product)
              <div class="col-md-4 col-sm-6 mb-3 ">
                  <div class="product-grid rounded-3">
            <div class="product-image border rounded-top">
                <a href="#" class="image">
                    <img src="{{$product['thumbnail'] }}">
                </a>
                <span class="product-discount-label">{{$product['discountPercentage'] }}%</span>
                <ul class="product-links">
                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
                <form action="{{ route('addCart', ['id' => $product['id']]) }}" method="post" id="add-to-cart-form-{{$product['id']}}">
                    @csrf
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="id" value="{{$product['id']}}">
                </form>
                <a class="add-to-cart" href="#" onclick="document.getElementById('add-to-cart-form-{{$product['id']}}').submit(); return false;">Add to Cart</a>
                
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

        </main>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection