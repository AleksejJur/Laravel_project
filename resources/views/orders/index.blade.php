@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="">Orders</h2>
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

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Adress</th>
                <th scope="col">Full Name</th>
                <th scope="col">Number</th>
                <th scope="col">Order Description</th>
                <th scope="col">Order Status</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>

                @foreach ($orders as $order)
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->adress}}k</td>
                    <td>{{$order->clientFullName}}</td>
                    <td>{{$order->clientNumber}}</td>
                    <td>{{$order->orderDescription}}</td>
                    <td>{{$order->orderStatus}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><button>View</button><button>Edit</button><button>Delete</button></td>
                @endforeach

            </tr>
        </tbody>
    </table>
</div>
@endsection