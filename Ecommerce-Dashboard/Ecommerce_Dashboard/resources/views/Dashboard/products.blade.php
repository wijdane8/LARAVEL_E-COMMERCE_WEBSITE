@extends('layouts.base')
@section('content')
<div class="container-fluid px-5 mx-1 mt-5 mb-2 justify-content-center">
  <div class="row justify-content-around ">
    <form action="{{route('search')}}" method="GET" class="col-lg-6 col-md-8 col-sm-10 col-12 d-flex mb-3 gap-3">
      <input type="text" name="search" class="form-control me-2" placeholder="Enter your search term">
      <button type="submit" class="btn btn-primary">Search</button>
      <div>
        <button href="{{route('products')}}" class=" btn btn-success ">products</button>
      </div>
    </form>
  </div>
  <!--add product Details modal-->
  @foreach($products as $row)
  @foreach($products_details as $row_product)
  @if($row_product['productid'] == $row['id'])
  <div class="container-fluid px-5 mx-1 mb-2 justify-content-center">
  <div class="row justify-content-center text-center">
  <div class="col">
  <div class="overflow-auto" style="max-height: 300px;">
  <div class="collapse" id="collapseDetails{{$row['id']}}">
  <div class="card card-body">
  <div class="container">
  <div class="card mt-1">
  <div class="card-body bg-white rounded border">
  <form action="{{route('updateDetails')}}" method="post">
  @csrf
  <div class="row mt-3 text-center">
  <input type="hidden" name="id" class="form-control p-1"  value="{{$row_product['id']}}">
  <input type="hidden" name="productid" class="form-control p-1"  value="{{$row_product['productid']}}">
  <input type="hidden" name="ProductName" class="form-control p-1"  value="{{$row['ProductName']}}">
  <label for="">Details for {{$row_product['ProductName']}}</label>
  <div class="col">
  <label for="prname">color</label>
  <input type="text" name="color" class="form-control p-1"  value="{{$row_product->color ?: 'not set' }}">
  <label for="prname">price</label>
  <input type="number" name="price" class="form-control p-1" value="{{$row_product->price?: 0 }}" >
  </div>
  <div class="col">
  <label for="prname">Quantity</label>
  <input type="number" name="qty" class="form-control p-1"  value="{{$row_product->qty?: 0 }}">
  <label for="prname">Description</label>
  <input type="textarea" name="description" class="form-control p-1" value="{{ $row_product->description ?: 'not set' }}"  >
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
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  @endif
  @endforeach
  @endforeach
  <!-- end ofmodal-->
  
                                                <!--products table-->
  <div class="container justify-content-center">
    <div class="card bg-white">
      <div class="card-body bg-white rounded border">
        <p class="text-end">Total Products : {{$products->count()}} and average price is: {{number_format($products_details->avg('price'),2)}}</p>
        <table class="table table-striped">
          <thead class="bg-white text-center">
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Color</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Description</th>
              <th colspan="3">Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach($products as $row)
            @foreach($products_details as $row_product)
            @if($row_product['productid'] == $row['id'])
            <tr >
              <td class="align-middle ">{{$row['id']}}</td>
              <td class="align-middle ">{{$row['ProductName']}}</td>
              <td>{{$row_product['color']}}</td>
              <td>{{$row_product['price']}} S.R</td>
              <td>{{$row_product['qty']}}</td>
              <td>{{$row_product['description']}}</td>
              <td class="align-middle ">
                <a href="{{route('deleteProduct', ['id' => $row['id']])}}"><i class="mx-3 fa fa-trash text-danger col" aria-hidden="true"><p>Delete</p></i></a>
                <a  data-bs-toggle="collapse" href="#collapseExample{{$row['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$row['id']}}"><i class="mx-2 fa fa-edit text-primary col" aria-hidden="true"> <p>Edit</p> </i></a>
                <a  data-bs-toggle="collapse" href="#collapseDetails{{$row_product['productid']}}" role="button" aria-expanded="false" aria-controls="collapseDetails{{$row_product['productid']}}"><i class=" fa fa-plus text-success col" aria-hidden="true"><p>Add Details</p></i></a>
              </td>
              
            </tr>
            @endif
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
                                                <!--end products table-->

                                                <!-- add new product Button -->
  <div class=" mt-3 ">
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add New Product
    </button>
  </div>
                                                <!-- add new product Button -->
</div>
                                                <!--end of container -->
                                                <!-- New Product collapse -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('create_product') }}" class="p-1 text-dark" method="post">
          @csrf
          <div class="row">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="ProductName">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                                                                                
                                                <!--end of collapse-->
                                                <!--add Edit product modal-->
<div class="container-fluid px-5 mx-1 mt-5 mb-2 justify-content-center">
  <div class="row justify-content-center text-center">
    <div class="col">
      <div class="overflow-auto" style="max-height: 300px;">
        @foreach($products as $row)
        <div class="collapse" id="collapseExample{{$row['id']}}">
          <div class="card card-body">
            <div class="container">
              <div class="card mt-1">
                <div class="card-body bg-white rounded border">
                  <form action="{{route('editProduct')}}" method="post">
                    @csrf
                    <div class="row mt-3 text-center">
                      <input type="hidden" name="id" class="form-control p-1" id="price" value="{{$row['id']}}">
                      <div class="col">
                        <label for="prname">Name</label>
                        <input type="text" name="ProductName" class="form-control p-1" id="prname" value="{{$row['ProductName']}}">
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
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
                                                <!-- end ofmodal-->


                                                
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    let collapseElements = document.querySelectorAll('.collapse');
    collapseElements.forEach(function(collapseElement) {
      collapseElement.addEventListener('show.bs.collapse', function() {
        collapseElements.forEach(function(otherCollapseElement) {
          if (otherCollapseElement !== collapseElement && otherCollapseElement.classList.contains('show')) {
            otherCollapseElement.classList.remove('show');
          }
        });
      });
    });
  });
</script>

@endsection