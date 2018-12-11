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
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
