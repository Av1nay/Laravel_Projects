@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/posts" class="btn btn-light">Go Back</a><br><br>
        <h1>{{$post->title}}</h1>
        <img style="width:100%" src="/storage/coverImages/{{$post->coverImage}}" alt="coverImage">
        <div>
            {!!$post->body!!}
        </div>
        <hr>
    <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a>
                {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST','class' => 'float-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
    </div>
</div>
    
@endsection