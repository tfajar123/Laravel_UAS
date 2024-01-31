@extends('layouts')

@section('content')
<div class="d-flex justify-content-center custom-margin-top">
    <h2>Update Tabs Data</h2>
        @php
            $title = old('title') ?? $tab->title;
            $description = old('description') ?? $tab->description;
            $genre = old('genre') ?? $tab->genre;
            $price = old('price') ?? $tab->price;
            $price_member = old('price_member') ?? $tab->price_member;
        @endphp
</div>
    
<div class="container d-flex align-items-center justify-content-center pt-5">
<form style="width: 26rem;" action="{{ route('tabs.update', $tab->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert"> {{ $message }}</div>
    @endif
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="title">Title</label>
    <input type="text" id="title" class="form-control border @error('title') is-invalid @enderror" name="title" value="{{ $title }}" required/>
    @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="description">Tuning</label>
    <input type="text" id="description" class="form-control border @error('description') is-invalid @enderror" name="description" value="{{ $description }}" required/>
    @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
  </div>
  
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="genre">Genre</label>
    <input type="text" id="genre" class="form-control border @error('genre') is-invalid @enderror" name="genre" value="{{ $genre }}" required/>
    @if ($errors->has('genre'))
        <span class="text-danger">{{ $errors->first('genre') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="price">Price</label>
    <input type="text" id="price" class="form-control border @error('price') is-invalid @enderror" name="price" value="{{ $price }}" required/>
    @if ($errors->has('price'))
        <span class="text-danger">{{ $errors->first('price') }}</span>
    @endif
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="price_member">Member Price</label>
    <input type="text" id="price_member" class="form-control border @error('price_member') is-invalid @enderror" name="price_member" value="{{ $price_member }}" required/>
    @if ($errors->has('price_member'))
        <span class="text-danger">{{ $errors->first('price_member') }}</span>
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
        <form action="{{ route('tabs.destroy', $tab->id) }}" method="post">
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