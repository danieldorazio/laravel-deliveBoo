@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Orders</h2>


        @if (count($orders) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Client</th>
                <th scope="col">Client Email</th>
                <th scope="col">Client Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Time</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->client_name}}</td>
                    <td>{{$order->client_email}}</td>
                    <td>{{$order->client_phone}}</td>
                    <td>{{$order->delivery_address}}</td>
                    <td>{{$order->delivery_time}}</td>
                    <td>{{$order->delivery_total_price}}</td>
                  </tr>
                @endforeach 
            </tbody>
        </table>
        @else
            <div class="alert alert-warning mt-2">
                <p>No orders available</p>
            </div>
        @endif
    </div>
@endsection