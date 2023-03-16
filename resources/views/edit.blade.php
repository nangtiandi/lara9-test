@extends('master')
@section('title') Home Page @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Edit your post ....</p>
                            <div class="">
                                <a href="{{ route('post.read') }}" class="btn btn-outline-primary">Views Posts</a>
                            </div>
                        </div>
                        <form action="{{ route('post.update',$post->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" rows="5" class="form-control">{{ $post->description }}</textarea>
                            </div>
                            <button class="btn btn-primary">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
