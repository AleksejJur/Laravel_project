@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-sm-offset-2">
            <h1>Create New Order</h1>
     		<hr>
			<form action="/orders" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="adress">Order Adress</label>
                    </div>
                    <input type="text" class="form-control" id="orderAdress" name="adress">
                </div>
				<div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="adress">Client Full Name</label>
                    </div>
                    <input type="text" class="form-control" id="orderClientFullName" name="clientFullName">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="adress">Client Number</label>
                    </div>
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
                        <label class="input-group-text" for="orderStatus">Order Status</label>
                    </div>
                    <select name="orderStatus" class="custom-select" id="orderClientStatus">
                        <option selected value="In Progress">In Progress</option>
                        <option value="Finished">Finished</option>
                    </select>
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