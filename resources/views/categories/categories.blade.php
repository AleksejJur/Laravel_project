@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="">Product Categories</h2>
        <hr>
        <p class="text-right">
            <a href="https://project.test/categories/create" class="btn btn-success">Add New Category</a>
        </p>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
    <div>

    <div class="row justify-content-center">

        @foreach ($categories as $category)

            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <img class="card-img-top" src="http://www.jaunuoliai.lt/images/uploader/180x180.g/fcnqgey-1.jpg" alt="Card image cap">
                    <h5 class="card-title">{{$category->title}}</h5>
                    <p class="card-text">{{$category->content}}</p>
                    <div class="row justify-content-center">
                        <a href="/categories/{{$category->id}}" class="btn btn-primary mr-2">View</a>
                        <a href="/categories/{{$category->id}}/edit" class="btn btn-warning mr-2">Edit</a>
                        <form action="/categories/{{$category->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger mr-2" value="Delete"/>
                        </form>
                    </div>    
                </div>
            </div>

        @endforeach

    </div>
</div>
@endsection
