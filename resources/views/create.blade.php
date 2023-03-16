@extends('master')
@section('title') Home Page @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Create your post ....</p>
                            <div class="">
                                <a href="{{ route('post.read') }}" class="btn btn-outline-primary">Views Posts</a>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success my-3">
                                <p class="mb-0">{{session('success')}}</p>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger my-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" rows="5" class="form-control @error('description') is-invalid @enderror">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
