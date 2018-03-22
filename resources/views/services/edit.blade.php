@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-sm-offset-2">
            <h2>Edit Service</h2>
            <hr>
            <form action="{{Route ('services.update', [$service->id])}}" id="form1" method="post" enctype="multipart/form-data" runat="server">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Service Title</label>
                    <input type="text" class="form-control" id="serviceTitle" name="title" value="{{$service->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Service Content</label>
                    <textarea cols="5" class="form-control" type="text" name="content" id="serviceContent" placeholder="{{$service->content}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Service Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="serviceTitle" name="price" value="{{$service->price}}">
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    Old :<img src="{{ asset('storage/'. $service->photos[0]->file_name)}}" alt="..." class="img-thumbnail">
                    New :<img  id="preview"  />
                </div>
                        
                <div class="input-group">
                    <div class="custom-file">
                        <input onchange="readURL(this);" type="file" src="#" alt="Image Display Here" name="photoForService" id="photoForService"
                        >
                    </div>
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
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

