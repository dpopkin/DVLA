@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item Details <a class="float-right" href="{{route('items.edit', $item->id)}}">Edit</a></div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{ $item->name }}</li>
                        <li class="list-group-item">Price: ${{ $item->price }}</li>
                        <li class="list-group-item">Description: {{ $item->description }}</li>
                        <li class="list-group-item">Aisle: {{ $item->aisle }}</li>
                    </ul>
                    <a class="float-left" href="{{ url('items')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
