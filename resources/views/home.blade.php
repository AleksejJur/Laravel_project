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

                    <div class="row justify-content-center">
                        <p class="col-sm-3">
                            <a class="btn btn-primary" href="https://project.test/categories/delete">Services</a>
                        </p>
                        <p class="col-sm-5">
                            <a class="btn btn-primary" href="https://project.test/categories">Products Categories</a>
                        </p>
                        <p class="col-sm-4">
                            <a class="btn btn-primary" href="https://project.test/products">All Products</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection