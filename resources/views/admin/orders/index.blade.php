@extends('layouts.admin')
@php
    $order_number = count($orders)    
@endphp
@section('content')
    <div class="container mt-5">
        <h2>List of Orders</h2>
    </div>

    @if (count($orders) > 0)
    
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client name</th>
                    <th scope="col">Payment</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Info</th>

                    
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>{{ $order_number-- }}</th>
                        <td>{{ $order->client_name }}</td>
                        <td>{{ $order->payment }}</td>
                        <td>{{ $order->client_email }}</td>
                        <td>{{ $order->delivery_address }}</td>
                        <td>{{ $order->delivery_time }}</td>
                        <td>
                            <a class="btn btn-outline-info px-3 mx-2"
                                href="{{ route('admin.orders.show', ['order' => $order->id]) }}">
                                <i class="fa-solid fa-info"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning mt-5">
            <p>No orders available</p>
        </div>
    @endif


@endsection
