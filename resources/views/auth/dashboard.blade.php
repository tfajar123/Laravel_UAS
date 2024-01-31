@extends('auth.layouts')

@section('content')
    
<main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, GuiGuitaran</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h5>Tabs List</h5>
                                <a href="{{ route('tabs.create') }}" class="btn btn-primary">Add Data</a>
                            </div>
                            <h6 class="card-subtitle text-muted">
                                This is just sample of Tabs List, to see more go to tabs dashboard.
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Tuning</th>
                                        <th scope="col">Member Price</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tabs as $tab)
                                    <tr>
                                      <th scope="row">{{ $tab->id }}</th>
                                      <td>{{ $tab->title }}</td>
                                      <td>{{ $tab->description }}</td>
                                      <td>{{ $tab->price_member }}</td>
                                      <td><button onclick="window.location='{{ route('tabs.edit', $tab->id) }}'">Edit</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h5>Guitar List</h5>
                                <a href="{{ route('guitars.create') }}" class="btn btn-primary">Add Data</a>
                            </div>
                            <h6 class="card-subtitle text-muted">
                                This is just sample of Guitars List, to see more go to guitar dashboard.
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code Name</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guitars as $guitar)
                                    <tr>
                                      <th scope="row">{{ $guitar->id }}</th>
                                      <td>{{ $guitar->name }}</td>
                                      <td>{{ $guitar->brand }}</td>
                                      <td>{{ $guitar->price }}</td>
                                      <td><button onclick="window.location='{{ route('guitars.edit', $guitar->id) }}'">Edit</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
@endsection
