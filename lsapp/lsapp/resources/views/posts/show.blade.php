@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/posts" class="btn btn-primary">Go Back</a>
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->body}}
        </div>
        <hr>
        <small>Written on: {{$post->created_at}}</small>
    </div>
</div>
    
@endsection