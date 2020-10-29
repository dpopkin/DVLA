@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Details <a class="float-right" href="{{route('users.edit', $user->id)}}">Edit</a></div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{ $user->name }}</li>
                        <li class="list-group-item">Email: {{ $user->email }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
