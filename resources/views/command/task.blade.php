@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Execute Command</div>

                <div class="card-body">
                    <form method="POST" action="/command/execute">
                            @csrf
                            <div class="form-group">
                                <label for="command">Enter Command. Refer to the manual for whitelisted commands: </label>
                                <input id="command" name="command" type="text" class="form-control @error('command') is-invalid @enderror">

                                @error('command')
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
