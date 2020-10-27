@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bill Details <a class="float-right" href="{{ url('bills')}}">Back</a></div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{ $bill->name }}</li>
                        <li class="list-group-item">Total: ${{ $bill->total }}</li>
                        <li class="list-group-item">Address: {{ $bill->address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
