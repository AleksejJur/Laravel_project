@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="/orders"><h2 class="">Orders</h2></a>
        <hr>
        <p class="text-right">
            <a href="/orders/create" class="btn btn-success">Add New Order</a>
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
    <div class="card">
        <div class="card-header">{{$orders->adress}} - {{$orders->clientFullName}} - +{{$orders->clientNumber}}</div>
        <div class="card-header">
            <a href="/services/?order_id={{$orders->id}}"><button>Add Service From List</button></a>
            <button>Add Product From List</button>
        </div>
        <div class="card-body">
            <h5 class="card-title">Status : {{$orders->status}}</h5>
            <p class="card-text">{{$orders->orderDescription}}.</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service ammount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($orderItem as $order)
                    <tr>
                        <th scope="row">1</th>
                            <td scope="row">{{$order->ammount}}</td>
                            <td scope="row">{{$order->price}} EUR</td>
                            <td scope="row">{{$order->ammount * $order->price}}</td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection