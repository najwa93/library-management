@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mt-4">
        <a href="{{route('admin.customers.create')}}" class="btn btn-success">Add</a>
    </div>

    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Customers Table</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($customers as $customer)
                                <tr>
                                    <th scope="row">{{$customer->id}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="{{route('admin.customers.edit',['customer' => $customer->id])}}"
                                                   class="btn btn-warning text-light btn-sm">Edit</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form method="post" action="{{route('admin.customers.destroy',['customer' => $customer->id ])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td>No Customers Added</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection