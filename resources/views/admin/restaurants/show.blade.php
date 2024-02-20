@extends('layouts.admin')


@section('content')
    <div class="container mt-5">

        <h2><strong>Name: </strong>{{ $restaurant->restaurant_name }}</h2>

        {{-- Image --}}
        <div class="mt-4">
            @if ($restaurant->image)
                <div>
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="" class="w-25">
                </div>
            @else
                <p>
                    <strong>Image: Not available </strong>
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

        {{-- Meals List --}}
        @if (count($restaurant->meals) > 0)
        <h3>Restaurant's meals</h3>
        <ul>
            @foreach ($restaurant->meals as $meal)
                <li>
                    <a href="{{ route('admin.meals.show', ['meal' => $meal->slug]) }}">{{ $meal->name }}</a>
                </li>
            @endforeach
        </ul>
        @else
            <p>
                No meals yet
            </p>
        @endif

        @include('partials.previous_button')

    </div>
@endsection
