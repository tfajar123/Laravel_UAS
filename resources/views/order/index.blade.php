@extends('layouts')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center custom-margin-top">
        <h2>Order</h2>
    </div>
    <table class="table mt-3">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col">Ordered At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
        <th scope="row">{{ $order->id }}</th>
        <td>{{ $order->product }}</td>
        <td>${{ $order->total_price }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection