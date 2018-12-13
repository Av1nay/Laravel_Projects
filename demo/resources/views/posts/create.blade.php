@extends('layouts.app');

@section('content')
    <h1 class="mt-3">Create Post</h1>
    {!!Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('title','Title',['class'=>'h3'])}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Description',['class'=>'h3'])}}
            {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::file('coverImage')}}
        </div>
            {{Form::submit('Publish',['class'=>'btn btn-primary'])}}
        
    {!! Form::close()!!}
@endsection