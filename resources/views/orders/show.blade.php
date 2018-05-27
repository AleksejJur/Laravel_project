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
            <a href="/services/?order_id={{$orders->id}}"><button>Add Service</button></a>
            <a href="/products/?order_id={{$orders->id}}"><button>Add Product</button></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Status : {{$orders->status}}</h5>
            <p class="card-text">{{$orders->orderDescription}}.</p>
            <div class="card-title">
                <h3 class="text-center">Pirmas Etapas</h3>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Darbu Pavadinimas</th>
                        <th scope="col">Mato vnt.</th>
                        <th scope="col">Kiekis</th>
                        <th scope="col">Kaina &euro; Darbas</th>
                        <th scope="col">Kaina &euro; Medziagos</th>
                        <th scope="col">Kaina &euro; Prietaisai</th>
                        <th scope="col">Kaina &euro; Mechanizmai</th>
                        <th scope="col">Suma &euro;</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                            <td scope="row">Demontavimo darbai (vandentekio, kanalizacijos, prietaisu demontavimas)</td>
                            <td scope="row">komp</td>
                            <td scope="row">100</td>
                            <td scope="row">1000</td>
                            <td scope="row">1000</td>
                            <td scope="row">100</td>
                            <td scope="row">100</td>
                            <td scope="row">10000</td>
                    </tr>    
                </tbody>
            </table>
















            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col">Service ammount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($orderItemService as $key => $orderService)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                            <td scope="row">{{$orderService->orderable->title}}</td>
                            <td scope="row">{{$orderService->ammount}}</td>
                            <td scope="row">{{$orderService->price}} EUR</td>
                            <td scope="row">{{$orderService->ammount * $orderService->price}}</td>
                            <td class="row" scope="row">
                                <button class="btn"><i class="fas fa-edit"></i></button>
                                <form action="{{$orders->id}}/delete" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="item_id" value="{{$orderService->id}}" />
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn" type="submit"><i class="fa fa-trash" /></i></button>
                                </form>                                
                            </td>
                        </tr>
                @endforeach
                    
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Product ammount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($orderItemProduct as $key => $orderProduct)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                            <td scope="row">{{$orderProduct->orderable->title}}</td>
                            <td scope="row">{{$orderProduct->ammount}}</td>
                            <td scope="row">{{$orderProduct->price}} EUR</td>
                            <td scope="row">{{$orderProduct->ammount * $orderProduct->price}}</td>
                            <td class="row" scope="row">
                                <button class="btn"><i class="fas fa-edit"></i></button>                                
                                <form action="{{$orders->id}}/delete" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="item_id" value="{{$orderProduct->id}}" />
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn" type="submit"><i class="fa fa-trash" /></i></button>
                                </form>
                            </td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection