@extends('layouts')

@section('content')
<div class="container custom-margin-top-big">
<div class="d-flex flex-column align-items-center mb-5">
    <h2 class="text-center mb-3">Tabs List</h2>
    <form action="/tabs/search" method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Search Guru ..." value="{{ old('search') }}">
        <input type="submit" value="Search">
    </form>
</div>
    
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-2 text-center">Title</div>
            <div class="col col-1 text-center">Tuning</div>
            <div class="col col-1 text-center">Price</div>
            <div class="col col-1 text-center">Details</div>
        </li>
        @foreach($tabs as $tab)
        <li class="table-row">
            <div class="col col-2" data-label="Job Id">
                <div class="font-bold-custom">
                    {{ $tab->title }}
                </div>
            </div>
            <div class="col col-1 text-center" data-label="Customer Name">{{ $tab->description }}</div>
            @guest
            <div class="col col-1 text-center" data-label="Amount">${{ $tab->price }}</div>
            @else
            <div class="col col-1 text-center" data-label="Amount">${{ $tab->price_member }}</div>
            @endguest
            <a href="{{ route('tabs.show', $tab->id) }}" class="btn btn-success btn-buy">View</a>
        </li>
        @endforeach
    </ul>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- Tombol "Previous" -->
            @if ($tabs->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $tabs->previousPageUrl() }}" rel="prev">Previous</a>
            </li>
            @endif
            <!-- Tombol "Next" -->
            @if ($tabs->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $tabs->nextPageUrl() }}" rel="next">Next</a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endsection