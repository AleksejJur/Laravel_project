@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="">Product Services</h2>
        <hr>
        <p class="text-right">
            <a href="https://project.test/services/create" class="btn btn-success">Alle</a>
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
</div>
@endsection
