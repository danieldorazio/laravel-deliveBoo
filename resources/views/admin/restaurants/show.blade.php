@extends('layouts.admin')


@section('content')
<div class="container mt-5">

    @include('partials.previous_button')

    
    <h2><strong>Name : </strong>{{ $restaurant->restaurant_name}}</h2>

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
    
    <div class="mt-4 w-50">
        <p>
            <strong>Slug : </strong>{{ $restaurant->slug}}
        </p>
    </div>

    <div class="mt-4 w-50">
        <p>
            <strong>PIVA : </strong>{{ $restaurant->piva_user ?? 'Not available ' }}
        </p>
    </div>

    <div class="mt-4 w-50">
        <p>
            <strong>Street : </strong>{{ $restaurant->street ?? 'Not available ' }}
        </p>
    </div>

    <div class="mt-4 w-50">
        <p>
            <strong>Time Open : </strong>{{ $restaurant->time_open ?? 'Not available ' }}
        </p>
    </div>

    <div class="mt-4 w-50">
        <p>
            <strong>Time Close : </strong>{{ $restaurant->time_close ?? 'Not available ' }}
        </p>
    </div>

</div>

@endsection