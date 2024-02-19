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

        <form class="mt-5" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->slug]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Name</label>
                <input type="text" class="form-control" @error('restaurant_name') is-invalid  @enderror
                    id="restaurant_name" name="restaurant_name"
                    value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label" @error('image') is-invalid  @enderror>Edit image</label>
                <input type="file" class="form-control" id="image" name="image"
                    value="{{ old('image', $restaurant->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if ($restaurant->image)
                <div>
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="">
                </div>
            @else
                <p>Nessuna immagine presente</p>
            @endif
            
            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control" @error('slug') is-invalid  @enderror id="slug"
                    name="slug" value="{{ old('slug', $restaurant->slug) }}">
            </div>

            {{-- P. Iva --}}
            <div class="mb-3">
                <label for="piva_user" class="form-label">P. Iva</label>
                <input type="text" class="form-control" id="piva_user" name="piva_user"
                    value="{{ old('piva_user', $restaurant->piva_user) }}" @error('piva_user') is-invalid  @enderror>
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" @error('street') is-invalid  @enderror value="{{ old('street', $restaurant->street) }}">
            </div>

            {{-- Opening Time --}}
            <div class="mb-3">
                <label for="time_open" class="form-label">Opening time</label>
                <input type="time" class="form-control" id="time_open" name="time_open"
                    value="{{ old('time_open', $restaurant->time_open) }}">
            </div>

            {{-- Closing Time --}}
            <div class="mb-3">
                <label for="time_close" class="form-label">Closing time</label>
                <input type="time" class="form-control" id="time_close" name="time_close"
                    value="{{ old('time_close', $restaurant->time_close) }}">
            </div>

            {{-- Save btn --}}
            <button class="btn btn-outline-success" type="submit">Save</button>
            {{-- Cancel btn --}}
            <a class="btn btn btn-outline-primary mx-3" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">Discard Changes</a>
            {{-- Go Back btn --}}
            @include('partials.previous_button')
        </form>
    </div>
@endsection
