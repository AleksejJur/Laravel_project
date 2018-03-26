@extends('layouts.app') 
@section('content')
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

                    <div class="row justify-content-center">
                        <p class="col-sm-3">
                            <a class="btn btn-primary" href="/services">Services</a>
                        </p>
                        <p class="col-sm-3">
                            <a class="btn btn-primary" href="/categories">Products Categories</a>
                        </p>
                        <p class="col-sm-3">
                            <a class="btn btn-primary" href="/products">All Products</a>
                        </p>
                        <p class="col-sm-3">
                            <a class="btn btn-primary" href="/orders">All Orders</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection