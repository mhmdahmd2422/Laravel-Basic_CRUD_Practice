@extends('layouts.master')

@section('content')

    <div class="main-content">
        <div class="card mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-6">
                            <h4>Show Post</h4>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <form action="{{route('posts.destroy', $post->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning mx-1">Edit</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
{{--                        <tr>--}}
{{--                            <th scope="row">{{$post->id}}</th>--}}
{{--                            <td>--}}
{{--                                <img src="{{asset($post->image)}}" alt="" width="100%" height="70">--}}
{{--                            </td>--}}
{{--                            <td>{{$post->title}}</td>--}}
{{--                            <td>{{$post->description}}</td>--}}
{{--                            <td>{{$post->category_id}}</td>--}}
{{--                            <td>{{date('d-m-y', strtotime($post->created_at))}}</td>--}}
{{--                            <td>--}}
{{--                                <a class="btn-sm btn-success">Show</a>--}}
{{--                                <a href="{{route('posts.edit', $post->id)}}" class="btn-sm btn-primary">Edit</a>--}}
{{--                                <a class="btn-sm btn-danger">Delete</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

                    <tr>
                        <td>ID</td>
                        <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img style="width: 50px; height: 50px" src="{{asset($post->image)}}"></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$post->title}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$post->description}}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{$post->category_id}}</td>
                    </tr>
                    <tr>
                        <td>Publish Date</td>
                        <td>{{date('y-m-d', strtotime($post->created_at))}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

