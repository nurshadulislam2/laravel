@extends('layouts.backend_master')

@section('title', 'Create Product')

@section('main')
<div class="row">
    <div class="card">
        <div class="card-header">
            Created Product
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="form-label col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="form-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="form-label col-sm-2">Discount</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="discount" name="discount">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="image" class="form-label col-sm-2">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="image" name="image" accept="image/png, image/jpeg" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection