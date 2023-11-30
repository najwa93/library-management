@extends('layouts.app')

@section('content')

    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Available Books</h6>
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
                                    <td>
                                        <div class="row">
                                            @if($book->status == 1)
                                                <div class="col-md-2">
                                                    <form method="post"
                                                          action="{{route('rent.add',['rent' => $book->id])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning text-light" >
                                                           Rent
                                                        </button>
                                                    </form>

                                                </div>
                                            @else
                                                <div class="col-md-2">
                                                    <form method="post"
                                                          action="{{route('rent.return',['book' => $book->id,'rent' => $book->issue->id])}}">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                           Return
                                                        </button>

                                                </div>

                                            @endif
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