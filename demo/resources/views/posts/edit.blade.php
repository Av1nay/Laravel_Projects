@extends('layouts.app');

@section('content')
    <h1 class="mt-3">Edit Post</h1>
    {{-- update the respective post with respective id requested --}}
    {!!Form::open(['action'=>['PostsController@update',$post ->id],'method'=>'POST'])!!}
        <div class="form-group">
            {{Form::label('title','Title',['class'=>'h3'])}}
            {{Form::text('title',$post -> title,['class'=>'form-control','placeholder'=>'Title of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Description')}}
            {{Form::textarea('description',$post -> description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description of the post here...'])}}
        </div>
            {{Form::hidden('_method','PATCH')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        
    {!! Form::close()!!}
@endsection