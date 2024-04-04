@extends('layouts.app')
@section('cartItems')
<span class="badge rounded-pill badge-notification bg-danger">
{{ $products->count() }}
</span>
@endsection
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
    <h1 class="display-4 text-capitalize">shopping cart</h1>
   
  </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead >
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-capitalize">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-capitalize">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-capitalize ">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-capitalize">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody >
                @foreach ($products as $item)
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="{{$item->thumbnail }}" alt="" class="img-fluid rounded shadow-sm "style=" width:4rem; height: 4rem;">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $item->ProductName }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">{{ $item->category }}</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>{{ $item->price }}</strong></td>
                  <td class="border-0 align-middle text-center">
                    <input id="quantity" type="number" value ="{{ $item->cart_qty }}" class="form-control quantity-inpu col-3 text-center">
                </td>
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
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">$400.00</h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


@endsection
