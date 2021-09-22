@extends('layouts.backend_master')

@section('title', 'All Products')

@section('main')

@if(Session::has('msg'))
<div class="bg-primary p-3 text-white my-3">{{Session::get('msg')}}</div>
@endif

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Products
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td class="text-center"><img src="{{asset('uploads/products/'.$product->image)}}" width="100" alt="{{$product->image}}"></td>
                    <td>{{$product->description}}</td>
                    <td>
                        @if($product->discount>0)
                        {{$product->discount}}
                        @else
                        No discount
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('admin.product.delete', $product->id)}}" method="post">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection