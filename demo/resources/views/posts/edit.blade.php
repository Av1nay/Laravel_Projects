@extends('layouts.app');

@section('content')
    <h1 class="mt-3">Edit Post</h1>
    {{-- update the respective post with respective id requested --}}
    {!!Form::open(['action'=>['PostsController@update',$post ->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('title','Title',['class'=>'h3'])}}
            {{Form::text('title',$post -> title,['class'=>'form-control','placeholder'=>'Title of the post here...'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Description')}}
            {{Form::textarea('description',$post -> description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description of the post here...'])}}
        </div>
            {{Form::hidden('_method','PATCH')}}
            <div class="form-row">
                @if ($post->coverImage != false)
                <div class="card-img col-md-4 col-sm-6 mb-4">
                    <img style="width:100%" src="/storage/cover_images/{{$post->coverImage}}">
                </div>
                @endif
                <div class="form-group ml-3">
                    {{Form::file('coverImage')}}
                </div>
            </div>
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        
    {!! Form::close()!!}
@endsection