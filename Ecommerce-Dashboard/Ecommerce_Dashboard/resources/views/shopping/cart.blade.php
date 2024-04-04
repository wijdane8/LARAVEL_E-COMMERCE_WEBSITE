@extends('layouts.app')
@section('content')

<style>
    body {
        background: #f3f3f3;
        background: -webkit-linear-gradient(to right, #f0f0f0ad, #dfaeae);
        background: linear-gradient(to top, #f0f0f0ad, #dfaeae);
        min-height: 100vh;
    }
</style>
<div class="px-4 px-lg-0">
    <!-- For demo purpose -->
    <div class="container text-white py-5 text-center">
        <h1 class="display-4 text-capitalize">Shopping Cart</h1>
    </div>
    <!-- End -->

    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-capitalize">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-capitalize">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-capitalize">Discount</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2  text-capitalize">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-capitalize">Total</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-capitalize">Remove</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{$item->thumbnail }}" alt="" class="img-fluid rounded shadow-sm "
                                                style=" width:4rem; height: 4rem;">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="{{route('productDetails', ['id' => $item->id]) }}" class="text-dark d-inline-block align-middle">{{ $item->ProductName }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">{{ $item->category }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong class="text-success">{{ $item->price }} <small>S.R</small></strong></td>
                                    <td class="border-0 align-middle"><strong class="text-danger">- {{ $item->discount }} %</strong></td>
                                    <td class="border-0 align-middle text-center" style="width:10rem;">
                                        <input id="quantity" type="number" min="1" max="10" value ="{{ $item->cart_qty }}" class="form-control quantity-input col-8 text-center">
                                    </td>
                                    <td class="border-0 align-middle"><strong class="text-success">{{ $item->total }} <small>S.R</small></strong></td>
                                    <td class="border-0 align-middle"><a href="{{ route('deleteCart', ['id' => $item->cart_id]) }}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted ">Order Subtotal </strong><strong id="subtotal" >$0.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted ">Total Discount</strong><strong class="text-danger" id="discount">$0.0</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted ">Shipping and handling</strong><strong class="text-success" id="shipping">$0.0</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted ">Tax</strong><strong class="text-success" id="tax">$0.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><strong class="text-success" id="total">$0.00</strong></li>
                        </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    // Calculate order summary based on items in the cart
    function calculateOrderSummary() {
        var subtotal = 0;
        var discountTotal = 0;
        var items = document.querySelectorAll('.quantity-input');
        
        items.forEach(function(item) {
            var price = parseFloat(item.parentNode.previousElementSibling.previousElementSibling.innerText);
            var discount = parseFloat(item.parentNode.previousElementSibling.innerText.split(' ')[1]);
            var quantity = parseInt(item.value);
            subtotal += price * quantity;
            discountTotal += (price * (discount / 100)) * quantity;
        });

        var shipping = subtotal * 0.03; // 20% shipping and handling fee
        var tax = subtotal * 0.05; // 5% tax
        var total = subtotal - discountTotal + shipping + tax;
        
        document.getElementById('subtotal').innerText =  subtotal.toFixed(2)+' S.R';
        document.getElementById('discount').innerText = '- ' + discountTotal.toFixed(2)+' S.R';
        document.getElementById('shipping').innerText = '+ ' + shipping.toFixed(2)+' S.R';
        document.getElementById('tax').innerText = '+ ' + tax.toFixed(2)+' S.R';
        document.getElementById('total').innerText = total.toFixed(2)+' S.R';
    }

    // Calculate order summary when page loads
    window.onload = function() {
        calculateOrderSummary();
    };

    // Calculate order summary when quantity input changes
    var quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            calculateOrderSummary();
        });
    });
</script>



@endsection
