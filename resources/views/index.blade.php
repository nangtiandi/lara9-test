@extends('master')
@section('title') Home Page @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Start Your Project ....</p>
                            <div class="">
                                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <i class="bi bi-facebook"></i>
                <h1 class="animate__animated animate__bounce">An animated element</h1>
                <button id="sweet" class="btn btn-outline-primary">Click</button>
            </div>
        </div>
    </div>
@endsection
