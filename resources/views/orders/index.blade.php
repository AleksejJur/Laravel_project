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
                <th scope="col">Client</th>
                <th scope="col">Order Status</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->adress}}</td>
                    <td>{{$order->clientFullName}}</td>
                    <td>{{$order->orderStatus}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <div class="row">
                            <a href="/orders/{{$order->id}}"><button>View</button></a>
                            <a href="/orders/{{$order->id}}/edit"><button>Edit</button></a>
                            <form action="/orders/{{$order->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection