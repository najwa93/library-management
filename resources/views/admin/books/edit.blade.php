@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8" style="margin-top: 5.5rem">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-1">Edit Book</h6>
                </div>
                <div class="card-body">
                    <form  method="post" action="{{route('admin.books.update',['book' => $book->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="Enter Book Name" value="{{$book->name}}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Author</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" id="author"
                                   placeholder="Enter Author Name" value="{{$book->author}}">
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
