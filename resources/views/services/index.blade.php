@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="">Services</h2>
        <hr>
        <p class="text-right">

            @admin
                <a href="/services/create" class="btn btn-success">Add New Service</a>
            @endadmin

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
    <div class="row">

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

                    @admin
                        <a href="/services/{{$service->id}}/edit" class="btn btn-warning mr-2">Edit</a>
                        <form action="/services/{{$service->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger mr-2" value="Delete"/>
                        </form>
                        <form action="/orders/{{$order_id}}/add/service" method="POST">
                            <input type="number" name="service_ammount">
                            <input type="hidden" name="service_id" value="{{$service->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-success mr-2" value="Add"/>
                        </form>
                    @endadmin
                    
                </div>    
            </div>
        </div>
    @endforeach

    </div>
    
    @if(session()->has('message.content'))
        <div class="alert alert-danger">
            <ul>
                {!! session('message.content') !!}
            </ul>
        </div>
    @endif
    
</div>
@endsection