@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-sm-offset-2">
            <h1>Create New Order</h1>
     		<hr>
			<form action="/orders" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="adress">Order Adress</label>
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