@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8" style="margin-top: 5.5rem">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-1">Edit Customer</h6>
                </div>
                <div class="card-body">
                    <form  method="post" action="{{route('admin.customers.update',['customer' => $customer->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="Enter Customer Name" value="{{$customer->name}}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Email</label>
                            <input type="email" name="author" class="form-control @error('email') is-invalid @enderror" id="email"
                                   placeholder="Enter Email" value="{{$customer->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Phone</label>
                            <input type="text" name="author" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   placeholder="Enter Phone Number" value="{{$customer->phone}}">
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   placeholder="Enter Password" value="{{$customer->password}}">
                            @error('password')
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
