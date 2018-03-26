@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8 col-sm-offset-2">
      		<h1>Edit Order</h1>
      		<hr>
			<form action="{{url('orders', [$order->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}
			<div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="adress">Order Adress</label>
                    </div>
                    <input type="text" class="form-control" id="orderAdress" name="adress">
                </div>
				<div class="form-group">
					<label for="clientFullName">Client Full Name</label>
					<input type="text" class="form-control" id="orderClientFullName" name="clientFullName">
				</div>
                <div class="form-group">
					<label for="clientNumber">Client Number</label>
					<input type="text" class="form-control" id="orderClientNumber" name="clientNumber">
				</div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="orderDescription">Order Description</label>
                    </div>
                    <input type="text" class="form-control" id="orderDescription" name="orderDescription">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="clientStatus">Order Status</label>
                    </div>
                    <select class="custom-select" id="orderClientStatus">
                        <option name="clientStatus" selected value="in_progress">In Progress</option>
                        <option name="clientStatus" value="finished">Finished</option>
                    </select>
                </div>
                <div class="form-group">
					<label for="orderDate">Date</label>
					<input type="date" class="form-control" id="orderDate" name="orderDate">
				</div>

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<button type="submit" class="btn btn-primary">Submit</button>
    		</form>
  		</div>
	</div>
</div>
@endsection