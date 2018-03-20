@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>Showing {{$product->title}}</h1>
                    <div class="jumbotron">
                        <p>
                            <strong>Product Title:</strong> {{$product->title}}
                            <br>
                            <strong>Description : </strong> {{$product->description}}
                            <br>
                            <strong>Manufacturer : </strong> {{$product->manufacturer}}
                            <br>
                            <strong>Size : </strong> {{$product->size}} cm
                            <br>
                            <strong>Material : </strong> {{$product->material}}
                            <br>
                            <strong>Price : </strong> {{$product->price}} EUR

    
                            @foreach ($product->photos as $photo)
                                <img class="card-img-top" src="{{ asset('storage/'. $photo->file_name)}}" alt="Card image cap">
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection