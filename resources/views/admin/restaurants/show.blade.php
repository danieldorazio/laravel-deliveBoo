@extends('layouts.admin')


@section('content')
<div class="container mt-5">

    <h2><strong>Name: </strong>{{ $restaurant->restaurant_name}}</h2>

    {{-- Image --}}
    <div class="mt-4 w-50">
        @if ($restaurant->image)
        <div>
            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="">
        </div>
    @else
        <p>
            <strong>Image : Not available </strong>
        </p>
    @endif
    </div>

    {{-- Slug
    <div class="mt-4 w-50">
        <p>
            <strong>Slug: </strong>{{ $restaurant->slug}}
        </p>
    </div> --}}

    {{-- P. Iva --}}
    <div class="mt-4 w-50">
        <p>
            <strong>P. IVA: </strong>{{ $restaurant->piva_user ?? 'Not available ' }}
        </p>
    </div>

    {{-- Address --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Address: </strong>{{ $restaurant->street ?? 'Not available ' }}
        </p>
    </div>

    {{-- Opening time --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Opening time: </strong>{{ $restaurant->time_open ?? 'Not available ' }}
        </p>
    </div>

    {{-- Closing time --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Closing time: </strong>{{ $restaurant->time_close ?? 'Not available ' }}
        </p>
    </div>

    @include('partials.previous_button')

</div>

@endsection