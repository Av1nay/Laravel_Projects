@extends('layouts.app');

@section('content')
    <a href="/posts" class="btn btn-light mt-3">GO BACK</a>
    <h1 class="mt-3">{{$post -> title}}</h1>
    <small class="card-subtitle text-muted">Written on : {{$post -> created_at}}</small>
    <hr>
    <div class="card-text h4">{{ strip_tags($post -> description) }}</div>
    <a href="/posts/{{$post -> id}}/edit" class="btn btn-primary my-3">EDIT</a>
    {{-- deleting post with given id --}}
    {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right']) !!}
        {{ Form::hidden('_method','DELETE')}}
        {{ Form::submit('DELETE',['class' =>'btn btn-danger'])}}
    {!! Form::close() !!}
    
@endsection