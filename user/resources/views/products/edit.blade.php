@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 90vh">
            <div class="col-md-5">
                <a class="btn btn-outline-primary my-2" href="{{route('product.index')}}">Back</a>
                <form action="" method="post" class=" card shadow p-4">
                    <h5 class="text-center">Edit Product</h5>
                    @csrf
                    <div class="form-group mt-2">
                        <label for="product">Product</label>
                        <input type="text" name="product" id="product" class="form-control" value="{{old('product') ?? $product->product}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="gross">Gross</label>
                        <input type="number" name="gross" id="gross" class="form-control" step=".0001" value="{{old('gross') ?? $product->gross}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="net">Net</label>
                        <input type="number" name="net" id="net" class="form-control" step=".0001" value="{{old('net') ?? $product->net}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control" value="{{old('unit') ?? $product->unit}}">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
