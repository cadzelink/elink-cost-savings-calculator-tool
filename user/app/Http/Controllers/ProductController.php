<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'gross' => 'required',
            'net' => 'required',
        ]);

        Product::create([
            'product' => $request->product,
            'gross' => $request->gross,
            'net' => $request->net,
        ]);

        return redirect(route('product.create'))->with('success','Product successfully added to database');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product' => 'required',
            'gross' => 'required',
            'net' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('product.edit', ['product'=>$product])->with('success', 'Product successfully update to the database');
    }

    public function delete(Product $product)
    {
        $product->delete();

       return redirect()->route('product.index')->with('success','Product has been successfully deleted from the database');
    }
}
