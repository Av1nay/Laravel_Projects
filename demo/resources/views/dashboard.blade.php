@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('include.messages')
                    <a href="posts/create" class="btn btn-primary">Create Post</a>
                    <h3 class="my-4">Your Posts</h3>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Title</th>
                            <th colspan="2">Description</th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td colspan="2">{!!$post->description!!}</td>
                                <td style="width:17%">
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                                    {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST','class' => 'float-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
