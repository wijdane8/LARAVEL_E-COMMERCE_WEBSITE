@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header" style="background-color: rgb(244, 158, 158);">{{ $product->ProductName }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->ProductName }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $product->ProductName }}</h4>
                            <p><strong>Color:</strong> <span style="color: {{ $product->color ?:'grey' }}">{{ $product->color }}</span></p>
                            <p><strong>Price:</strong> ${{ $product->price }}</p>
                            <p><strong>Description:</strong> {{ $product->description }}</p>
                            <p><strong>Quantity:</strong> {{ $product->qty }}</p>
                            <p><strong>Brand:</strong> {{ $product->brand }}</p>
                            <p><strong>Discount Percentage:</strong> {{ $product->discountPercentage }}%</p>
                            <p><strong>Rating:</strong> 
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->rate)
                                        <i class="fa fa-star" style="color: gold;"></i>
                                    @else
                                        <i class="fa fa-star" style="color: gray;"></i>
                                    @endif
                                @endfor
                            </p>
                            <p><strong>Category:</strong> <a href="{{ route('products_page', ['category' => $product->category]) }}">{{ $product->category }}</a></p>
                            
                            <!-- Add to Cart Form -->
                            <form method="POST" action="{{ route('addCart', ['id' => $product['id']]) }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" name="qty" min="1" max="{{$product->qty}}" class="form-control" value="1" min="1">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary border-0" style="background-color: rgb(131, 222, 208);">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Add to Cart Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
