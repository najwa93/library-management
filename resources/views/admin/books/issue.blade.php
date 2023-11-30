@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mt-4">
        <a href="{{route('admin.books.create')}}" class="btn btn-success">Add</a>
    </div>

    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Issues Table</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Returned Date</th>
                                <th scope="col">Available</th>
                                <th scope="col">User</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($issues)
                                @foreach($issues as $issue)
                                    <tr>
                                        <th scope="row">{{$issue->id}}</th>
                                        <td>{{$issue->book->name}}</td>

                                        @if(!$issue->issue_date)
                                            <td>----</td>
                                        @else
                                            <td>{{$issue->issue_date}} </td>
                                        @endif

                                        @if(!$issue->returned_date)
                                            <td>----</td>
                                        @else
                                            <td>{{$issue->returned_date}} </td>
                                        @endif

                                        @if($issue->book->available)
                                            <td><span class="badge bg-success">Returned</span></td>
                                        @else
                                            <td><span class="badge bg-danger">Issued</span></td>

                                        @endif
                                        @if(!$issue->user_id)
                                            <td>----</td>
                                        @else
                                            <td>{{$issue->user->name}} </td>
                                        @endif

                                        <td>
                                            <a href="{{route('admin.books.edit',['book' => $issue->id])}}"
                                               class="btn btn-warning text-light">Edit</a>
                                            <a href="#"
                                               class="btn btn-danger text-light">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach

                            @else
                                <tr><td>No Books Added</td></tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection