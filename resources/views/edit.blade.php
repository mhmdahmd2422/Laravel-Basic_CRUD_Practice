@extends('layouts.master')

@section('content')

    <div class="main-content">
        @if($errors->all())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="card mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-6">
                            <h4>Edit Posts</h4>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="" class="btn btn-warning mx-1">Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <div>
                            <img src="{{asset($post->image)}}" style="width: 200px">
                        </div>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select</option>
                            @foreach($categories as $category)
                                <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

