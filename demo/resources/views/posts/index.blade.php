@extends('layouts.app');

@section('content')
    <h1 class="mt-3">Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                <h2 class="card-title "><a href="/posts/{{$post -> id}}"> {{$post ->title}}</a></h2>
                    <small class="card-subtitle text-muted">Written on : {{$post -> created_at}}</small>
                    <hr>
                    <p class="card-text h4">{{$post -> description}}</p>
                </div>
            </div>
            <br>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>OOPS! No posts found!!</p>
    @endif
@endsection