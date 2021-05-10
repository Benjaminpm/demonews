@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">         	


                </div>

                <div class="card-body">
                    Hi there, regular user
                    <h3>Bienvenido estas en home <a href="{{ route('create') }}">Create News</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
