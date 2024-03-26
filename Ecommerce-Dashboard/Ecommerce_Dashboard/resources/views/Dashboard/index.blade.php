@extends('layouts.base')
@section('content')
<style>
    .hover-scale {
        transition: transform 0.3s ease-in-out;
}

.hover-scale:hover {
    transform: scale(1.1);
    color:orange;

}

</style>
<div class='container row m-5 p-2'>
    <div class="col-3 col bg-white rounded shadow-sm text-center m-3 py-3 border border hover-scale ">
        <a href="" class="text-decoration-none">
    <span class="material-symbols-outlined">
receipt
</span><h5>Invoice</h5></a>
    </div>
    <div class="col-3 col bg-white rounded shadow-sm text-center m-3 py-3 border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded shadow-sm text-center m-3 py-3 border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded text-center shadow-sm m-3 py-3 border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded text-center m-3 py-3 shadow-sm border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded text-center m-3 py-3 shadow-sm border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded text-center m-3 py-3 shadow-sm border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded text-center m-3 py-3 shadow-sm border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
    <div class="col-3 col bg-white rounded shadow-sm text-center m-3 py-3 border hover-scale">
        <a href="" class=" text-decoration-none">
    <span class="material-symbols-outlined">
category
</span><h5>Products</h5></a>
    </div>
</div>
@endsection