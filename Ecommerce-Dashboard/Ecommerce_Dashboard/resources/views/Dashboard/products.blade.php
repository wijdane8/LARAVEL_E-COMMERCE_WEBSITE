@extends('layouts.base')
@section('content')
<div class="container-fluid px-5 mx-1 mt-5 mb-2 justify-content-center">
  <div class="row justify-content-around ">
    <form action="{{route('products')}}" method="GET" class="col-lg-6 col-md-8 col-sm-10 col-12 d-flex mb-3 gap-3">
      <input type="text" name="search" class="form-control me-2" placeholder="Enter your search term">
      <button type="submit" class="btn btn-primary">Search</button>
      <div>
        <button href="{{route('products')}}" class=" btn btn-success ">ShowAll</button>
      </div>
    </form>
  </div>
  <!--add product Details modal-->
  @foreach($products_details as $row_product)
  
  <div class="modal overflow-scroll " data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="modalDetails{{$row_product['productid']}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Details for {{$row_product['ProductName']}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  <form action="{{route('updateDetails')}}" method="post" class="needs-validation" novalidate>
  @csrf
  <div class="col mt-3 text-center">
  <input type="hidden" name="id" class="form-control p-1"  value="{{$row_product['id']}}">
  <input type="hidden" name="productid" class="form-control p-1"  value="{{$row_product['productid']}}">
  <div class="row">
    <div class="col-6">
    <label >Product Name</label>
    <input required type="text" name="ProductName" class="form-control p-1 @error ('ProductName') is-invalid @enderror" value="{{$row_product->ProductName}}" >
    <div class="invalid-feedback">
      Please enter Product Name.
    </div>
    
  </div>
    <div class="col-6">
    <label >Color</label>
    <input type="text" name="color" class="form-control p-1 @error ('color') is-invalid @enderror"  value="{{$row_product->color ?: 'not set' }}">
    <div class="invalid-feedback">
      Somthing wrong.
    </div>  
  </div>
</div>
  <div class="row">
    <div class="col-6">
    <label >Price</label>
    <input type="number" name="price" class="form-control p-1 @error ('price') is-invalid @enderror" value="{{$row_product->price?: 0 }}" >
    <div class="invalid-feedback">
      Please enter Number.
    </div>   
  </div>
    <div class="col-6">
    <label >Quantity</label>
    <input type="number" name="qty" class="form-control p-1 @error ('qty') is-invalid @enderror"  value="{{$row_product->qty?: 0 }}">
    <div class="invalid-feedback">
      Please enter Number.
    </div> 
  </div>
</div>
  <div class="row">
    <div class="col-6">
    <label >Category</label>
    <select class="form-select @error ('category') is-invalid @enderror" aria-label="Default select example" name="category">
      <option selected class="is-invalid" >Open this select menu</option>
      @foreach($category_list as $category)
      <option value="{{$category}}" @if($row_product->category == $category)selected @endif</option>{{$category}}</option>
      @endforeach
    </select>
    <div class="invalid-feedback">
      Somthing Wrong.
    </div>   
  </div>
    <div class="col-6">
    <label >Brand</label>
    <input type="text" name="brand" class="form-control p-1 @error ('brand') is-invalid @enderror"  value="{{$row_product->brand}}">
    <div class="invalid-feedback">
      Somthing Wrong.
    </div> 
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-6">
  <label >Discount Percentage</label>
  <input type="number" name="discountPercentage" class="form-control p-1 @error ('discountPercentage') is-invalid @enderror" value="{{$row_product->discountPercentage }}" >
  <div class="invalid-feedback">
    Please enter Number.
  </div> 
</div>
</div>
  <br>
  <div class="row text-center justify-content-center">
    <label  >Images</label>
    <input class="col-6 form-control" type="file" name="images">
    <label >Thumbnail</label>
    <input class="col-6 form-control" type="file" name="thumbnail" class="form-control p-1"  value="{{$row_product->thumbnail}}">
  </div>
  <label >Description</label>
  <input type="textarea" name="description" class="form-control p-1 @error ('description') is-invalid @enderror" value="{{ $row_product->description ?: 'not set' }}"  >
  <div class="invalid-feedback">
    Somthing wrong.
  </div>   
</div>
  <button type="submit" class="btn btn-primary col-3 mt-3">Save</button>
  </form>

</div>
</div>
</div>
</div>


@endforeach
<!-- end ofmodal-->

<!-- add new product Button -->
<!--products table-->
<div class="container justify-content-center">
  <div class="card bg-white">
    <div class="card-body bg-white rounded border">
      <p class="text-start"><strong>Total Products :</strong> {{$products_details->count()}}</p>
      <table class="table table-striped">
        <thead class="bg-white text-center">
          <tr>
            <th>Product Name</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Discount Percentage</th>
            <th>Description</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody class="text-center align-middle">
         
          @foreach($products_details as $row_product)
          <tr >
            <td >{{$row_product['ProductName']}}</td>
            <td>{{$row_product['color']}}</td>
            <td>{{$row_product['price']}} <small>S.R</small></td>
            <td>{{$row_product['qty']}}</td>
            <td>{{$row_product['brand']}}</td>
            <td>{{$row_product['category']}}</td>
            <td>{{$row_product['discountPercentage']}}</td>
            <td class="col-3 overflow-hidden ">{{$row_product['description']}}</td>
            <td >
              <a href="{{route('deleteProduct', ['id' => $row_product['productid']])}}"><i class="mx-3 fa fa-trash text-danger col" aria-hidden="true"><p>Delete</p></i></a>
              <a  data-bs-toggle="modal" href="#modalDetails{{$row_product['productid']}}" role="button" aria-expanded="false" aria-controls="modalDetails{{$row_product['productid']}}"><i class=" fa fa-plus text-success col" aria-hidden="true"><p>Add Details</p></i></a>
              
              @endforeach
            </td>
            
          </tr>
        </tbody>
      </table>
      <p class="text-start"><strong>Average price is:</strong> {{number_format($products_details->avg('price'),2)}}  <small>S.R</small</p>
      </div>
    </div>
  </div>
  <div class="text-end mt-4 me-3">
  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Product
  </button><br/>
  <a class="me-3" href="{{route('unpack_DB')}}">unpack jason  file</a>
</div>
  
  
  
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
  <div class="pagination justify-content-center mb-5">
    {{ $products_details->links("pagination::default") }}
</div>


                                                                                                
                                                <!--end of collapse-->
                                                <script>
                                                  // Function to toggle the collapse element
                                                  function toggleCollapse(productId) {
                                                    var collapseElement = document.getElementById('collapseDetails' + productId);
                                                    if (collapseElement.classList.contains('show')) {
                                                      collapseElement.classList.remove('show');
                                                    } else {
                                                      collapseElement.classList.add('show');
                                                    }
                                                  }
                                                </script>
                                                
                                                <!-- Update the collapse href to call the toggleCollapse function -->

                                                
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
<script>(function () {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      // Check if the form has any invalid fields
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        // If the form is valid, find the modal and close it
        var modal = form.closest('.modal');
        if (modal) {
          var modalInstance = bootstrap.Modal.getInstance(modal);
          if (modalInstance) {
            modalInstance.hide();
          }
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
})();

</script>


@endsection