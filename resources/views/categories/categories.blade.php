@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

                </div class="card-header justify-content-center">
                    <p class="text-center">Product Categories</p>
                    <p class="text-center"><a href="https://project.test/categories/create" class="btn btn-primary">Add New Category</a></p>
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
                                <h5 class="card-title">{{$category->title}}</h5>
                                <p class="card-text">{{$category->content}}</p>
                                <a href="/categories/{{$category->id}}" class="btn btn-primary">View</a>
                                <a href="/categories/{{$category->id}}/edit" class="btn btn-secondary">Edit</a>
                                <form action="/categories/{{$category->id}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </div>
                            </div>

                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
