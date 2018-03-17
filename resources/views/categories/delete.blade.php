@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
  
                </div class="card-header">
                    <p class="text-center">Categories Delete</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <div class="row justify-content-center">
                            <div class="card" style="width: 30rem;">
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body">
                                <h5 class="card-title">Category 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="card" style="width: 30rem;">
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body">
                                <h5 class="card-title">Category 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="card" style="width: 30rem;">
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body">
                                <h5 class="card-title">Category 3</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
