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
                        </p>
                        <div>
                        <img src="http://gerunda.lt/wp-content/uploads/2015/11/Rutulinis-kranas-sutvirtint-v_v-sr.-2.png" alt="..." class="img-thumbnail">
                        <img src="http://gerunda.lt/wp-content/uploads/2015/11/Rutulinis-kranas-sutvirtint-v_v-sr.-2.png" alt="..." class="img-thumbnail">
                        <img src="http://gerunda.lt/wp-content/uploads/2015/11/Rutulinis-kranas-sutvirtint-v_v-sr.-2.png" alt="..." class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection