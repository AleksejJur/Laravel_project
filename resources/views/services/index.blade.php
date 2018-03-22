@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="">Product Services</h2>
        <hr>
        <p class="text-right">
            <a href="/services/create" class="btn btn-success">Add New Service</a>
        </p>
    </div>
    <hr>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
    <div>
    @foreach ($services as $service)
        
        <div class="card" style="width: 15rem;">
            <div class="card-body">

            @if ($service->photos->count() > 0)
                <img class="card-img-top" src="{{ asset('storage/'. $service->photos[0]->file_name)}}" alt="Card image cap">
            @endif

                <h5 class="card-title">{{$service->title}}</h5>
                <p class="card-text">{{$service->content}}</p>
                <p class="card-text">{{$service->price}}</p>
                <div class="row justify-content-center">
                    <a href="/services/{{$service->id}}" class="btn btn-primary mr-2">View</a>
                    <a href="/services/{{$service->id}}/edit" class="btn btn-warning mr-2">Edit</a>
                    <form action="/services/{{$service->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger mr-2" value="Delete"/>
                    </form>
                </div>    
            </div>
        </div>

    @endforeach
</div>
@endsection