@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 90vh">
            <div class="col-md-5">
                <a class="btn btn-outline-primary my-2" href="{{route('book.index')}}">Back</a>
                <form action="{{route('book.update', ['book' => $book])}}" method="post" class=" card shadow p-4">
                    <h5 class="text-center">Update Book</h5>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ $message }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <label for="package">Package</label>
                        <input type="text" name="package" id="package" class="form-control" value="{{$book->package}}">
                        @error('package')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="cover">Cover</label>
                        <input type="text" name="cover" id="cover" class="form-control" value="{{$book->cover}}">
                        @error('cover')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="size">Size</label>
                        <input type="text" name="size" id="size" class="form-control" value="{{$book->size}}">
                        @error('size')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="cover_cost">Cover Cost</label>
                        <input type="text" name="cover_cost" id="cover_cost" class="form-control" value="{{$book->cover_cost}}">
                        @error('cover_cost')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="cost_per_page">Cost Per Page</label>
                        <input type="text" name="cost_per_page" id="cost_per_page" class="form-control" value="{{$book->cost_per_page}}">
                        @error('cost_per_page')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
