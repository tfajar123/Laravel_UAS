@extends('layouts')

@section('content')
<div class="d-flex justify-content-center custom-margin-top">
    <h2>Update Tabs Data</h2>
        @php
            $name = old('name') ?? $guitar->name;
            $brand = old('brand') ?? $guitar->brand;
            $material = old('material') ?? $guitar->material;
            $price = old('price') ?? $guitar->price;
        @endphp
</div>
    
<div class="container d-flex align-items-center justify-content-center pt-5">
<form style="width: 26rem;" action="{{ route('guitars.update', $guitar->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert"> {{ $message }}</div>
    @endif
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" class="form-control border @error('name') is-invalid @enderror" name="name" value="{{ $name }}" required/>
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="brand">Brand</label>
    <input type="text" id="brand" class="form-control border @error('brand') is-invalid @enderror" name="brand" value="{{ $brand }}" required/>
    @if ($errors->has('brand'))
        <span class="text-danger">{{ $errors->first('brand') }}</span>
    @endif
  </div>
  
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="material">Material</label>
    <input type="text" id="material" class="form-control border @error('material') is-invalid @enderror" name="material" value="{{ $material }}" required/>
    @if ($errors->has('material'))
        <span class="text-danger">{{ $errors->first('material') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="price">Price</label>
    <input type="text" id="price" class="form-control border @error('price') is-invalid @enderror" name="price" value="{{ $price }}" required/>
    @if ($errors->has('price'))
        <span class="text-danger">{{ $errors->first('price') }}</span>
    @endif
  </div>

  <div class="mb-5 row">
        <label for="upload" class="col-md-4 col-form-label text-md-end text-start">{{ __('File') }}</label>
        <div class="col-md-6">
            <input type="file" class="form-control" name="images">
        </div>
    </div>
  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>
</div>
<div class="d-flex justify-content-center">
        <form action="{{ route('guitars.destroy', $guitar->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger btn-block" style="width: 200px">Delete</button>
        </form>
</div>
<script>
import { Input, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Input, Ripple });
</script>
@endsection