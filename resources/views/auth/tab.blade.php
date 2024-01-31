@extends('auth.layouts')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
    <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h5>Tabs List</h5>
                                <a href="{{ route('tabs.create') }}" class="btn btn-primary">Add Data</a>
                            </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tuning</th>
                        <th scope="col">Member Price</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabs as $tab)
                    <tr>
                        <th scope="row">{{ $tab->id }}</th>
                        <td>{{ $tab->title }}</td>
                        <td>{{ $tab->description }}</td>
                        <td>{{ $tab->price_member }}</td>
                        <td>{{ $tab->updated_at }}</td>
                        <td><button onclick="window.location='{{ route('tabs.show', $tab->id) }}'">View</button></td>
                        <td><button onclick="window.location='{{ route('tabs.edit', $tab->id) }}'">Edit</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
</main>
@endsection
