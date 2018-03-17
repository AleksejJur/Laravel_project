@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8 col-sm-offset-2">
			<h3>Create category</h3>
			@include('categories.partials.form')
		</div>
	</div>
</div>
@endsection