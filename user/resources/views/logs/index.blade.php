@extends('layouts.authenticated')

@section('pages')
    <div class="container">
        <div class="row justify-content-center my-4">
                <h3 class="text-center">Log list</h3>
            <div class="card shadow p-3">
                <table class="table table-bordered mt-2">
                    <thead>
                      <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($logs as $log)
                        <tr>
                            <th scope="row">{{$log->user->getFullName()}}</th>
                            <td>{{$log->item_name}}</td>
                            <td>{{$log->description}}</td>
                            <td>{{Str::title($log->action)}}</td>
                            <td>{{Carbon\Carbon::parse($log->created_at)->format('m-d-Y')}}</td>
                        </tr>
                      @empty

                      @endforelse

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
