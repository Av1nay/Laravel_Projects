@extends('layouts.app');

@section('content')
    <h1 class="mt-3">Create Post</h1>
    {!!Form::open(['action'=>'PostsController@store'])!!}
        <div class="form-group">
            {{Form::label('title','Title',['class'=>'h3'])}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Description',['class'=>'h3'])}}
            {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Publish',['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close()!!}
@endsection