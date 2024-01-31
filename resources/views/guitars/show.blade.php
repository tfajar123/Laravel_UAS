@extends('layouts')

@section('content')
<section class="py-5">
  <div class="container custom-margin-top">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="rounded-4 mb-3 d-flex justify-content-center position-relative">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('images/' . $guitar->images) }}" />
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <div class="d-flex align-items-center mb-3">
              <h4 class="title text-white mb-0">
                  {{ $guitar->name }} <br />
              </h4>
              <a href="{{ url()->previous() }}" class="btn btn-outline-light ms-auto">
                  <i class="fas fa-arrow-left"></i> Back
              </a>
          </div>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
            <span class="text-success ms-2">In stock</span>
          </div>

          <div class="mb-3">
            <span class="h5">${{ $guitar->price }}</span>
            <span class="text-muted">/ Digital Piece</span>
          </div>

          <div class="row">
            <dt class="col-3">Brand</dt>
            <dd class="col-9">{{ $guitar->brand }}</dd>

            <dt class="col-3">Material</dt>
            <dd class="col-9">{{ $guitar->material }}</dd>
          </div>

          <hr />
          @if(Auth::check())
          <form action="{{ route('order.store') }}" method="post">
              @csrf
              <input type="hidden" name="product" value="{{ $guitar->name }}">
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <input type="hidden" name="price" value="{{ $guitar->price }}">
              <button type="submit" class="btn btn-warning shadow-0"> Buy now </button>
          <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
          </form>
          @else
          <button class="btn btn-warning shadow-0" onclick="window.location='{{ route('login') }}'"> Buy now </button>
          <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
          @endif
        </div>
      </main>
    </div>
  </div>
</section>
@endsection