@extends('layouts.app');

@section('content')
    <h1 class="mt-3">{{$post -> title}}</h1>
    <small class="card-subtitle text-muted">Written on : {{$post -> created_at}}</small>
    <hr>
    <p class="card-text h4">{{$post -> description}}</p>
@endsection