@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h2 class="text-center">Edit restaurant informations</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <form class="" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->slug]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Restaurant name" type="text" class="form-control" id="restaurant_name"
                            name="restaurant_name" value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">
                        <label for="restaurant_name">Name</label>
                    </div>


                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Edit image</label>
                        <input type="file" class="form-control" id="image" name="image"
                            value="{{ old('image', $restaurant->image) }}">
                    </div>

                    @if ($restaurant->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $restaurant->image) }}" alt=""
                                class="my-logo-restaurant-and-food">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif

                    {{-- P. Iva --}}
                    <div class="form-floating mb-3">
                        <input placeholder="P. IVA" type="text" class="form-control" id="piva_user" name="piva_user"
                            value="{{ old('piva_user', $restaurant->piva_user) }}">
                        <label for="piva_user">P.IVA</label>
                    </div>

                    {{-- Address --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Street" type="text" class="form-control" id="street" name="street"
                            value="{{ old('street', $restaurant->street) }}">
                        <label for="street">Street</label>
                    </div>

                    {{-- Opening Time --}}
                    <div class="mb-3 col-3">
                        <label for="time_open" class="form-label">Opening time</label>
                        <input type="time" class="form-control" id="time_open" name="time_open"
                            value="{{ old('time_open', $restaurant->time_open) }}">
                    </div>

                    {{-- Closing Time --}}
                    <div class="mb-3 col-3">
                        <label for="time_close" class="form-label">Closing time</label>
                        <input type="time" class="form-control" id="time_close" name="time_close"
                            value="{{ old('time_close', $restaurant->time_close) }}">
                    </div>

                    {{-- Categories --}}
                    <div class="mb-3">
                        <h5>Choose one or more categories:</h5>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input @checked($restaurant->categories->contains($category)) type="checkbox" name="categories[]"
                                    id="category-{{ $category->id }}" value="{{ $category->id }}">
                                <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    {{-- Save btn --}}
                    <button class="btn btn-outline-success" type="submit">Save</button>
                    {{-- Cancel btn --}}
                    <a class="btn btn btn-outline-primary mx-3"
                        href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">Discard
                        Changes</a>
                    {{-- Go Back btn --}}
                    @include('partials.goback_to_restaurants_index')
                </form>
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\UpdateRestaurantRequest') !!}
@endsection
