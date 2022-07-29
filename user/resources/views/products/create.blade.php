@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center my-4" >
            <div class="col-md-5">
                <a class="btn btn-outline-primary my-2" href="{{route('product.index')}}">Back</a>
                <form action="" method="post" class=" card shadow p-4">
                    <h5 class="text-center">Add New Product</h5>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ $message }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @csrf
                    <div class="form-group mt-2">
                        <label for="product">Product</label>
                        <input type="text" name="product" id="product" class="form-control" value="{{old('product')}}">
                        @error('product')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="gross">Gross</label>
                        <input type="number" name="gross" id="gross" class="form-control" step=".0001" value="{{old('gross')}}">
                        @error('gross')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="net">Net</label>
                        <input type="number" name="net" id="net" class="form-control" step=".0001"  value="{{old('net')}}">
                        @error('net')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control"  value="{{old('unit')}}">
                        @error('unit')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-select">
                            <option value="" disabled selected>Select one</option>
                            @foreach ($types as $key => $value)
                                @if (old('type') == $key)
                                    <option value="{{$key}}" selected>{{$value == '' ? 'None' : $value }}</option>
                                @else
                                    <option value="{{$key}}">{{$value == '' ? 'None' : $value }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('type')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
