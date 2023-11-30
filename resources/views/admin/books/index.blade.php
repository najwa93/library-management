@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mt-4">
        <a href="{{route('admin.books.create')}}" class="btn btn-success">Add</a>
    </div>

    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Books Table</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($books as $book)
                                <tr>
                                    <th scope="row">{{$book->id}}</th>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>
                                        @if($book->status == 1)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Issued</span>
                                        @endif
                                    </td>

                                    <span class="badge badge-success">Issued</span>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="{{route('admin.books.edit',['book' => $book->id])}}"
                                                   class="btn btn-warning text-light btn-sm">Edit</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form method="post"
                                                      action="{{route('admin.books.destroy',['book' => $book->id ])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger btn-sm">Delete
                                                    </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Books Added</td>
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