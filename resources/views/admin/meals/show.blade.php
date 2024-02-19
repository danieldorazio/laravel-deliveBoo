@extends('layouts.admin')


@section('content')
    <div class="container mt-5">

        <h2><strong>Name: </strong>{{ $meal->name }}</h2>

        <div class="mt-4 w-50">
            <div class="mt-4 w-50">
                @if ($meal->image)
                    <div>
                        <img src="{{ asset('storage/' . $meal->image) }}" alt="">
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

        @include('partials.previous_button')

    </div>
@endsection
