@extends('layouts.base')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-body bg-white rounded border">
          <form action="{{route('updateProduct')}}" method="post">
            @csrf
           <div class="row mt-3 text-center" >
            
                <input type="hidden" name="id" class="form-control p-1" id="price" value="{{$item['id']}}">
            <div class="col">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control p-1" id="price" value="{{$item['price']}}">
             </div>
             <div class="col">
                <label for="prname">Name</label>
                <input type="text" name="productname" class="form-control p-1" id="prname" value="{{$item['product_name']}}">
             </div>
             
           </div>
           <div class="row mt-3">
             <div class="col text-center">
                <button class="btn btn-success" type="submit">Save</button>
             </div>
           </div>
          </form>
        </div>
    </div>
</div>
@endsection