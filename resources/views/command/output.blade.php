@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Command Output <a class="float-right" href="{{route('command')}}">Back</a></div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item"> @foreach($output as $results) {{ $results }} @endforeach</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
