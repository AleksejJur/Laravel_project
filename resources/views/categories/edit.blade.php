@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        </div>

        <div class="card-body justify-content-center">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

                <h1>Edit Category</h1>
                <hr>
                <form action="/categories/{{$category->id}}/edit" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" id="categoryTitle" name="title" value="{{$category->title}}">
                    </div>
                    <div class="form-group">
                        <label for="content">Category Content</label>
                        <textarea cols="5" class="form-control" type="text" name="content" id="categoryContent" placeholder="{{$category->content}}"></textarea>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
    </div>
</div>
</div>
</div>
@endsection

