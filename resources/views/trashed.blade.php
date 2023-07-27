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
                        <a href="" class="btn btn-warning mx-1">Back</a>
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
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <img src="https://picsum.photos/100" alt="">
                    </td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet aspernatur, aut culpa cum cupiditate eligendi esse eveniet ex fugit id</td>
                    <td>News</td>
                    <td>02-05-2023</td>
                    <td>
                        <a class="btn-sm btn-success">Show</a>
                        <a class="btn-sm btn-primary">Edit</a>
                        <a class="btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
