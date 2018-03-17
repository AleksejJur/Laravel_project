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

                    <!-- <h1>Showing {{$category->id}}</h1>
                    <div class="jumbotron text-center">
                        <p>
                            <strong>Category Title:</strong> {{$category->title}}
                            <br>
                            <strong>Content:</strong> {{$category->content}}
                        </p>
                    </div> -->

                    @foreach ($products as $product)

                    <h1>Showing {{$product->title}}</h1>
                    <div class="jumbotron text-center">
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
                        </p>
                    </div>

                    @endforeach

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection