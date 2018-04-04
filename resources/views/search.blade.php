@extends('layouts.app')
@section('content')
    <div class="container">

    @if ( $orders->isNotEmpty() || $categories->isNotEmpty() 
        || $products->isNotEmpty() || $services->isNotEmpty()) 

        {{--@if ($users->isNotEmpty()) //uncomment this fot user search
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Users</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row"><a href="">{{ $user->name }}</a></th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif--}}

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
                        <th scope="row"><a href="/orders/{{$order->id}}">{{ $order->clientFullName }}</a></th>
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
                        <th scope="row"><a href="">{{ $category->title }}</a></th>
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
                        <th scope="row"><a href="">{{ $service->title }}</a></th>
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
                        <th scope="row"><a href="">{{ $product->title }}</a></th>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

    @else
        <div class="text-center">Please Search again</div>
    @endif

    </div>
@endsection