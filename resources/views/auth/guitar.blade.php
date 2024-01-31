@extends('auth.layouts')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
    <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h5>Guitar List</h5>
                                <a href="{{ route('guitars.create') }}" class="btn btn-primary">Add Data</a>
                            </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guitars as $guitar)
                    <tr>
                        <th scope="row">{{ $guitar->id }}</th>
                        <td>{{ $guitar->name }}</td>
                        <td>{{ $guitar->brand }}</td>
                        <td>{{ $guitar->price }}</td>
                        <td>{{ $guitar->updated_at }}</td>
                        <td><button onclick="window.location='{{ route('guitars.show', $guitar->id) }}'">View</button>
                        </td>
                        <td><button onclick="window.location='{{ route('guitars.edit', $guitar->id) }}'">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    </div>
</main>
@endsection