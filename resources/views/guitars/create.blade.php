@extends('layouts')

@section('content')
<div class="d-flex justify-content-center custom-margin-top">
    <h2>Create Guitars Data</h2>
</div>

<div class="container d-flex align-items-center justify-content-center pt-5">
<form style="width: 26rem;" action="{{ route('guitars.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert"> {{ $message }}</div>
    @endif
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" class="form-control border @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required/>
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="brand">Brand</label>
    <input type="text" id="brand" class="form-control border @error('brand') is-invalid @enderror" name="brand" value="{{  old('brand') }}" required/>
    @if ($errors->has('brand'))
        <span class="text-danger">{{ $errors->first('brand') }}</span>
    @endif
  </div>
  
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="material">Material</label>
    <input type="text" id="material" class="form-control border @error('material') is-invalid @enderror" name="material" value="{{  old('material') }}" required/>
    @if ($errors->has('material'))
        <span class="text-danger">{{ $errors->first('material') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="price">Price</label>
    <input type="text" id="price" class="form-control border @error('price') is-invalid @enderror" name="price" value="{{  old('price') }}" required/>
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
  <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Create</button>
</form>
</div>
@endsection