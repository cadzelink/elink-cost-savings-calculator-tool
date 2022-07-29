<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Imports\ProductImport;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

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

        $product = Product::create([
            'product' => $request->product,
            'gross' => $request->gross,
            'net' => $request->net,
        ]);

        $description = Logger::generateReport(Arr::only($request->all(), ['product', 'gross', 'net', 'unit']));
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $product->product,
            'item_table' => 'calculator',
            'description' => $description,
            'action' => Log::$CREATE
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

        $description = Logger::generateReport(Arr::except($product->toArray(),['id', 'type', 'status']), $request->except(['_token', '_method']), Log::$MODIFY);
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $product->product,
            'item_table' => 'calculator',
            'description' => $description,
            'action' => Log::$MODIFY
        ]);

        $product->update($request->all());


        return redirect()->route('product.edit', ['product'=>$product])->with('success', 'Product successfully update to the database');
    }

    public function delete(Product $product)
    {
        $description = Logger::generateReport(Arr::except($product->toArray(),['id', 'type', 'status']),[],Log::$DELETE);
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $product->product,
            'item_table' => 'calculator',
            'description' => $description,
            'action' => Log::$DELETE
        ]);
        $product->delete();

       return redirect()->route('product.index')->with('success','Product has been successfully deleted from the database');
    }

    public function importPage()
    {
        return view('products.bulk');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        Excel::import((new ProductImport), $request->file('file')->store('temp'));

        return redirect(route('product.import-list'));
    }

    public function importList()
    {
        if(!session()->get('productSession')){
            return redirect(route('product.import-page'));
        }

        $products = session()->get('productSession');
        // dd($products);
        return view('products.import_list', compact('products'));
    }

    public function importCancel()
    {
        if(!session()->get('productSession')){
            return redirect(route('product.import-bulk'));
        }

        session()->forget('productSession');
        return redirect(route('product.index'));
    }

    public function removeList(Request $request)
    {
        if(!session()->get('productSession')){
            return redirect(route('product.import-bulk'));
        }
        // GG ko dinhi maong ogma nata mag tiwas >_<
        $products = session()->get('productSession');
        for($count = 0; $count < count($products) ; $count++){
            if($products[$count]['product'] == $request->product){
                // Arr::pull($products, '0');
                $products->splice($count, 1);
                session()->put('productSession', $products);
            }
        }

        return back();
    }

    public function importData(Request $request)
    {
        if(!session()->get('productSession')){
            return redirect(route('product.import-bulk'));
        }

        $products = session()->get('productSession');

        foreach($products as $product)
        {
            Product::create([
                'product' => $product['product'],
                'gross' => $product['gross'],
                'net' => $product['net'],
                'unit' => $product['unit'],
                'type' => $product['type'],
                'status' => $product['status']
            ]);
        }

        session()->forget('productSession');
        return redirect(route('product.import-page'));
    }

}
