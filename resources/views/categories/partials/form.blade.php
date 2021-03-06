<h2>Add New Category</h2>
<hr>
<form action="/categories" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="title">Category Title</label>
		<input type="text" class="form-control" id="categoryTitle" name="title">
	</div>
	<div class="form-group">
		<label for="content">Category Content</label>
		<div class="input-group">
  			<textarea class="form-control" aria-label="With textarea" id="categoryContent" name="content"></textarea>
		</div>
	</div>
	<div class="input-group">
		<div class="custom-file">
			<input onchange="readURL(this);" type="file" name="photoForCategory" id="photoForCategory">
		</div>
	</div>
	<div><img  id="preview"  /></div>
	<br>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>

				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach

			</ul>
		</div>
	@endif

	<button type="submit" class="btn btn-success">Submit</button>
</form>