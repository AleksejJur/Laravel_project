@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h1>Showing {{$services->title}}</h1>
                    <div class="jumbotron">
                        <p>
                            <div class="row">

                                @if ($services->photos->count() > 0) 
                                    <img src="{{ asset('storage/'. $services->photos[0]->file_name)}}" class="rounded float-left" alt="...">
                                @endif

                            </div>
                            <strong>Description : </strong> {{$services->content}}
                            <br>
                            <strong>Price : </strong> {{$services->price}}
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection