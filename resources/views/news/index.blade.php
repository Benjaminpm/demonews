@extends('layouts.app')

@section('content') 
    <a class="btn btn-success pull-right" href="{{ url('/newss/create') }}" role="button">Nueva news</a>
    @include('news.partials.table')
@endsection