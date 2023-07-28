@extends('layouts.master')

@section('content')

    <div class="main-content">
        <div class="card mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-6">
                            <h4>Deleted Posts</h4>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{route('posts.index')}}" class="btn btn-warning mx-1">Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%">Image</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 10%">Category</th>
                        <th scope="col" style="width: 10%">Publish Date</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img src="{{asset($post->image)}}" alt="" width="100%" height="70">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{date('d-m-y', strtotime($post->created_at))}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('posts.restore', $post->id)}}" class="btn-sm btn-success">Restore</a>
                                    <form action="{{route('posts.force_delete', $post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>

@endsection
