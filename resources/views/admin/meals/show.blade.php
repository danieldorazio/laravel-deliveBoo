@extends('layouts.admin')


@section('content')
    <div class="container mt-5">

        <h2><strong>Name: </strong>{{ $meal->name }}</h2>

        <p>
            Restaurant: {{ $meal->restaurant ? $meal->restaurant->restaurant_name : 'No restaurant chosen' }}
        </p>

        <div class="mt-4 w-50">
            <div class="mt-4 w-50">
                @if ($meal->image)
                    <div>
                        <img src="{{ asset('storage/' . $meal->image) }}" alt="" class="my-logo-restaurant-and-food">
                    </div>
                @else
                    <p>
                        <strong>Image : Not available </strong>
                    </p>
                @endif
            </div>
        </div>

        {{-- <div class="mt-4 w-50">
        <p>
            <strong>Slug: </strong>{{ $meal->slug}}
        </p>
    </div> --}}

        <div class="mt-4 w-50">
            <p>
                <strong>Description: </strong>{{ $meal->description ?? 'Not available ' }}
            </p>
        </div>

        <div class="mt-4 w-50">
            <p>
                <strong>Price: </strong>{{ $meal->price ?? 'Not available ' }} €
            </p>
        </div>

        @include('partials.goback_to_meals_index')

    </div>
@endsection
