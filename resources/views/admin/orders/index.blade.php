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

    @foreach ($order_array as $order)
        {{$order->client_name}}

        {{$order->date}}
    @endforeach

@endsection
