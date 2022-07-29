@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 80vh">
            <h3 class="text-center">Book List</h3>
            <div class="card pt-3 mt-1">
                <div class="d-flex mb-2">
                    <form action="{{route('book.index')}}" method="get" class="d-flex gap-2">
                        <input type="text" name="name" id="name" class="form-control" value="{{ request()->name}}">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                    <div class="ms-auto">
                        <a href="{{route('book.import-page')}}" class="btn btn-danger">Bulk Import</a>
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
                        <th>Action</th>
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
                                <td class="d-flex gap-2 justify-content-center">
                                    <a href="{{route('book.edit', ['book' => $book])}}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                          </svg>
                                    </a>
                                    <form action="{{route('book.delete', ['book' => $book])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg>
                                        </button>
                                    </form>
                                </td>
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

