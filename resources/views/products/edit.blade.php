@extends('layouts.app') @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8 col-sm-offset-2">
      <h1>Edit product</h1>
      <hr>
      <form action="{{url('products', [$product->id])}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Product Title</label>
          <input type="text" class="form-control" id="productkTitle" name="title" value="{{$product->title}}">
        </div>
        <div class="form-group">
          <label for="manufacturer">Produt Manufacturer</label>
          <input type="text" class="form-control" id="productManufacturer" name="manufacturer" value="{{$product->manufacturer}}">
        </div>
        <div class="form-group">
          <label for="description">Produt Description</label>
          <input type="text" class="form-control" id="productDescription" name="description" value="{{$product->description}}">
        </div>
        <div class="form-group">
          <label for="size">Produt Size</label>
          <input type="number" class="form-control" id="productSize" name="size" value="{{$product->size}}">
        </div>
        <div class="form-group">
          <label for="material">Produt Material</label>
          <input type="text" class="form-control" id="productMaterial" name="material" value="{{$product->material}}">
        </div>
        <div class="form-group">
          <label for="price">Produt Price</label>
          <input type="number" class="form-control" id="productPrice" name="price" value="{{$product->price}}">
        </div>

        @if ($product->photos->count() > 0)

        <div class="row justify-content-center">
          <p>Old :</p>

          @foreach ($product->photos as $photo)
            <div>
              <label class="btn btn-primary">
                <img src="{{ asset('storage/'. $photo->file_name)}}"
                  alt="..." class="img-thumbnail img-check">
                  <input type="checkbox" name="file[]" value="{{$photo->id}}">
              </label>
            </div>
          @endforeach
          <br>
        </div>
        <p class="row">New :</p>
                    <img id="preview" />
        @endif
    <div class="form-group">
      <label for="category">Produt Category</label>
      <fieldset>

        @foreach ($categories as $category)

        <input type="checkbox" name="category[]" value="{{$category->id}}" />{{$category->title}}
        <br /> @endforeach

      </fieldset>
    </div>
    <div class="input-group">
      <div class="custom-file">
        <input onchange="readURL(this);" type="file" src="#" alt="Image Display Here" name="photoForProduct[]" id="photoForProduct" multiple>
      </div>
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