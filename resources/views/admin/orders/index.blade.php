@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Orders</h2>
    </div>

    {{-- @if (count($orders) > 0)
        @foreach ($orders as $order)
            @if (count($order->meals) > 0)
                @foreach ($order->meals as $meal)
                    @if ($meal->restaurant_id === Auth::user()->id)
                        {{$order->id}}
                        {{$order->client_name}}
                    @endif
                @endforeach
            @endif
        @endforeach
    @else
        <div class="alert alert-warning mt-2">
            <p>No orders available</p>
        </div>
    @endif --}}

    @if (count($orders) > 0)
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th></th>
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
