@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>Add New Product</h1>
     		<hr>
			<form action="/products" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Product Title</label>
					<input type="text" class="form-control" id="productkTitle" name="title">
				</div>
				<div class="form-group">
					<label for="manufacturer">Produt Manufacturer</label>
					<input type="text" class="form-control" id="productManufacturer" name="manufacturer">
				</div>
				<div class="form-group">
					<label for="description">Produt Description</label>
					<input type="text" class="form-control" id="productDescription" name="description">
				</div>
				<div class="form-group">
					<label for="size">Produt Size</label>
					<input type="number" class="form-control" id="productSize" name="size">
				</div>
				<div class="form-group">
					<label for="material">Produt Material</label>
					<input type="text" class="form-control" id="productMaterial" name="material">
				</div>
				<div class="form-group">
					<label for="price">Produt Price</label>
					<input type="number" class="form-control" id="productPrice" name="price">
				</div>
				<div class="form-group">
					<div class="custom-file">
						<p>
							<input onchange="readURL(this);" type="file" name="photoForProduct[]" id="photoForProduct" required multiple title="Upload one or more images">
							New :<img  id="preview"  />
						</p>
					</div>
				</div>
				<div class="form-group">
					<label for="category">Produt Category</label>
					<fieldset>

					@foreach ($categories as $category)
						<input type="checkbox" name="category[]" value="{{$category->id}}" />{{$category->title}}
						<br />
					@endforeach

					</fieldset>
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