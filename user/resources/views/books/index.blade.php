@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 80vh">
            <h3 class="text-center">Book List</h3>
            <div class="card pt-3 mt-1">
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{route('book.create')}}" class="btn btn-primary">Add New Book</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Package</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Size</th>
                        <th scope="col">Cover Cost</th>
                        <th scope="col">Cost Per Page</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{$book->package}}</td>
                                <td>{{$book->cover}}</td>
                                <td>{{$book->size}}</td>
                                <td>{{$book->cover_cost}}</td>
                                <td>{{$book->cost_per_page}}</td>
                            </tr>

                        @empty

                        @endforelse

                    </tbody>
                  </table>
                  {{$books->links()}}
            </div>
        </div>
    </div>
@endsection

