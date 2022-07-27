@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 90vh">
            <div class="col-md-5">
                <a class="btn btn-outline-primary my-2" href="{{route('book.index')}}">Back</a>
                <form action="" method="post" class=" card shadow p-4">
                    <h5 class="text-center">Update Book</h5>
                    @csrf
                    <div class="form-group mt-2">
                        <label for="package">Package</label>
                        <input type="text" name="package" id="package" class="form-control" value="{{$book->package}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="cover">Cover</label>
                        <input type="text" name="cover" id="cover" class="form-control" value="{{$book->cover}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="size">Size</label>
                        <input type="text" name="size" id="size" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="cover_cost">Cover Cost</label>
                        <input type="text" name="cover_cost" id="cover_cost" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="cost_per_page">Cost Per Page</label>
                        <input type="text" name="cost_per_page" id="cost_per_page" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
