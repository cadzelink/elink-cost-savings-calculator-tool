@extends('layouts.authenticated')

@section('pages')
<div class="container">
    <div class="row justify-content-center align-content-center" style="height: 90vh">
        <div class="col-md-5">
            <a class="btn btn-outline-primary my-2" href="{{route('product.index')}}">Back</a>
            <form action="{{route('product.import-file')}}" method="post" enctype="multipart/form-data" class=" card shadow p-4">
                <h5 class="text-center">Import Product</h5>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>{{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @csrf
                <div class="form-group mt-2">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" class="form-control" >
                    @error('file')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
