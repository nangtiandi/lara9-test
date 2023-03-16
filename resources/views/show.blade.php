@extends('master')
@section('title') Home Page @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Details Post ...</p>
                            <div class="">
                                <a href="{{ route('post.read') }}" class="btn btn-outline-primary">View Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-2 border-0 shadow mb-3">
                    <div class="card-title">
                        <h4 class="text-info px-3 mb-0"> {{$post->title}}</h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <p class="card-text"> {{ $post->description }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
