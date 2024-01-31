@extends('layouts')

@section('content')
<section class="custom-margin-small">
  <div class="container py-5">
    <h2 class="text-center mb-5">Guitar List</h2>

    <div class="row">
        @foreach($guitars as $guitar)
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
          <img src="{{ asset('images/' . $guitar->images) }}" style="float: left;
    width: 100%;
    height: 200px;
    object-fit: cover;" />
          <a href="{{ route('guitars.show', $guitar->id) }}">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
              <div class="d-flex justify-content-start align-items-start h-100">
                <h5><span class="badge bg-light pt-2 ms-3 mt-3 text-dark">${{ $guitar->price }}</span></h5>
              </div>
            </div>
            <div class="hover-overlay">
              <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
        <!-- Tombol "Previous" -->
        @if ($guitars->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $guitars->previousPageUrl() }}" rel="prev">Previous</a>
            </li>
        @endif
        <!-- Tombol "Next" -->
        @if ($guitars->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $guitars->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif
    </ul>
</nav>
</section>
@endsection