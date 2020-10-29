@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User <a class="float-right" href="{{ url('users', Auth::id())}}">Back</a></div>

                <div class="card-body">
                    <form method="POST" action="/users/{{Auth::id()}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input id="email" name="email" type="text" max-length="200" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="">Name: </label>
                                <input id="name" type="text" max-length="200" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection