@extends('Dashboard.editProduct')
@section('editProduct')

<form action="{{route('editProduct', ['id' => $product['id']])}}" method="post">
   @csrf
   <div class="row mt-3 text-center" >
      
      <input type="hidden" name="id" class="form-control p-1" id="price" value="{{$product['id']}}">
      <div class="col">
         <label for="prname">Name</label>
         <input type="text" name="ProductName" class="form-control p-1" id="prname" value="{{$product['ProductName']}}">
      </div>
      
   </div>
   <div class="row mt-3">
      <div class="col text-center">
         <button class="btn btn-success" type="submit">Save</button>
      </div>
   </div>
</form>
@endsection