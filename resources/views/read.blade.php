@extends('master')
@section('title') Home Page @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">View All Post ...</p>
                            <div class="">
                                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success my-3">
                        <p class="mb-0">{{session('success')}}</p>
                    </div>
                @endif

                <div class="">
                    <form action="{{ route('post.read') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="keyword" value="{{ request('keyword') }}">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                </div>
                @foreach($posts as $post)
                    <div class="card p-2 border-0 shadow mb-3">
                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h4 class="text-info px-3 mb-0"> {{$post->title}}</h4>
                            <div class="d-flex">
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning mx-2">Edit</a>
                                <form action="{{ route('post.delete',$post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <p class="card-text"> {{ \Illuminate\Support\Str::words($post->description,30,' ...') }} </p>
                            <a href="{{ route('post.show',$post->id) }}" class="card-link">See More</a>
                        </div>
                    </div>
                @endforeach
                <div class="">
{{--                    {{$posts->appends(request()->query())->links()}}--}}
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
