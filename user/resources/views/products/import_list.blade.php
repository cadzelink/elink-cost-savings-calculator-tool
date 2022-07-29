@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center mt-4 ">
            <h3 class="text-center">Product List</h3>
            <div class="card pt-3 mt-1">
                <div class="d-flex mb-2">
                    <div class="ms-auto d-flex gap-2">
                        <a href="{{route('product.import-cancel')}}" class="btn btn-danger">
                            Cancel Import</a>
                    @if (count($products) > 0)
                        <form action="{{route('product.import-data')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Import Products</button>
                        </form>
                    @endif
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Gross</th>
                        <th scope="col">Net</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Type</th>
                        <th scope="col">Remark</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $value)
                            <tr>
                                <td>{{$value['product']}}</td>
                                <td>{{$value['gross']}}</td>
                                <td>{{$value['net']}}</td>
                                <td>{{$value['unit']}}</td>
                                <td>{{$value['type']}}</td>
                                <td><b class="{{$value['create'] ? 'text-success' : 'text-warning'}}">{{$value['create'] ? 'ADD' : 'UPDATE'}}</b></td>
                                <td class="d-flex gap-2 justify-content-center">
                                    {{-- <a href="{{route('product.edit', ['product' => $product])}}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                          </svg>
                                    </a> --}}
                                    <form action="{{route('product.import-remove')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value="{{$value['product']}}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No item to import</td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

