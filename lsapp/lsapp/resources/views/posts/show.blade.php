@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/posts" class="btn btn-primary">Go Back</a><br><br>
        <h1>{{$post->title}}</h1>
        <div>
            {!!$post->body!!}
        </div>
        <hr>
        <small>Written on: {{$post->created_at}}</small>
        <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a>
    {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST','class' => 'float-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    </div>
</div>
    
@endsection