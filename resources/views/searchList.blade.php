@extends('layouts.app')
@section('content')
    <div class="container">

        @if ($users->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Users</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->name }}</th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

        @if ($orders->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Orders</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($orders as $order)    
                    <tr>
                        <th scope="row">{{ $order->clientFullName }}</th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

        @if ($categories->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Categories</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($categories as $category)    
                    <tr>
                        <th scope="row">{{ $category->title }}</th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

        @if ($services->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Services</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($services as $service)    
                    <tr>
                        <th scope="row">{{ $service->title }}</th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

        @if ($products->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Products</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)    
                    <tr>
                        <th scope="row">{{ $product->title }}</th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>
    
@endsection