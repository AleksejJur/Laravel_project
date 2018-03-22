@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-sm-offset-2">
            <h2>Add New Service</h2>
            <hr>
            <form action="/categories/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Service Title</label>
                    <input type="text" class="form-control" id="serviceTitle" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Service Content</label>
                    <div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" id="serviceContent" name="content"></textarea>
                    </div>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photoForService" id="photoForService">
                    </div>
                </div>
                <br> @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection