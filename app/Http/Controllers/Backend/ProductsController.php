<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {

        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:5',
            'price' => 'required | numeric',
            'image' => 'required | image',
            'description' => 'required'
        ]);
        $newName = "product" . time() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/products/', $newName);
        $inputs = [
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'discount' => $request->input('discount'),
            'image' => $newName
        ];

        Product::create($inputs);
        return redirect()->route('admin.products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required | min:5',
            'price' => 'required | numeric',
            'description' => 'required'
        ]);

        $inputs = [
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'discount' => $request->input('discount')
        ];
        $product = Product::find($id);
        $product->update($inputs);

        if (!empty($request->file('image'))) {
            unlink('uploads/products/' . $product->image);
            $newName = "product" . time() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/products/', $newName);
            $product->update(['image' => $newName]);
        }

        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        unlink('uploads/products/' . $product->image);
        $product->delete();

        return redirect()->back();
    }
}
