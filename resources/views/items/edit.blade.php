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
                <div class="card-header">Edit Item {{$item->item_name}} <a class="float-right" href="{{ url('items')}}">Back</a></div>

                <div class="card-body">
                    <form method="POST" action="/items/{{$item->id}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="description">Description (200 characters max): </label>
                                <input id="description" name="description" type="text" max-length="200" value="{{$item->description}}" class="form-control @error('description') is-invalid @enderror">

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="aisle" class="">Aisle (200 characters max): </label>
                                <input id="aisle" type="text" max-length="200" name="aisle" value="{{$item->aisle}}" class="form-control @error('aisle') is-invalid @enderror">

                                @error('aisle')
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