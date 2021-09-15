@extends('layouts.backend_master')

@section('title', 'Edit Product')

@section('main')
<div class="row">
    <div class="card">
        <div class="card-header">
            Edit Product
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="title" class="form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$product->title}}" id="title" name="title">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="form-label col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{$product->price}}" id="price" name="price">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="form-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="form-label col-sm-2">Discount</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="discount" value="{{$product->discount}}" name="discount">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="image" class="form-label col-sm-2">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control mb-2" type="file" id="image" name="image" accept="image/png, image/jpeg">
                        <img src="{{asset('uploads/products/'.$product->image)}}" width="50" alt="{{$product->image}}">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection