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
                <div class="card-header">Client Attributes <a class="float-right" href="{{ url('home')}}">Back</a></div>

                <div class="card-body">
                    <task-component></task-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection