@extends('layouts.admin')


@section('content')
<div class="container mt-5">

    {{-- Name --}}
    <h2><strong>Name: </strong>{{ $meal->name}}</h2>

    {{-- Image --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Image: </strong>{{ $meal->image ?? 'Not available ' }}
        </p>
    </div>

    {{-- Slug --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Slug: </strong>{{ $meal->slug}}
        </p>
    </div>

    {{-- Description --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Description: </strong>{{ $meal->description ?? 'Not available ' }}
        </p>
    </div>

    {{-- Price --}}
    <div class="mt-4 w-50">
        <p>
            <strong>Price: </strong>{{ $meal->price ?? 'Not available ' }} €
        </p>
    </div>

    {{-- Go Back btn --}}
    @include('partials.previous_button')

</div>

@endsection