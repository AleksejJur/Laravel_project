<h1>Add New Category</h1>
<hr>
<form action="/categories/store" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="title">Category Title</label>
		<input type="text" class="form-control" id="categoryTitle" name="title">
	</div>
	<div class="form-group">
		<label for="content">Category Content</label>
		<input type="text" class="form-control" id="categoryContent" name="content">
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