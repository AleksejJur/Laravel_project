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
                    
                    @foreach ($products as $product)
                        <h1>Showing <a href="/products/{{$product->id}}"> {{$product->title}}</a></h1>
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

                                <div class="row">

                                    @if ($product->photos->count() > 0)
                                        <img src="{{ asset('storage/'. $product->photos[0]->file_name)}}" class="rounded float-left" alt="...">
                                    @endif

                                </div>
                            </p>
                        </div>

                        @admin
                            <a href="{{ URL::to('products/' . $product->id . '/edit') }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        @endadmin
                        
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection