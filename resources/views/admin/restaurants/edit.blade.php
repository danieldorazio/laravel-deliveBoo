@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Add a new restaurant</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $restaurant->image) }}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $restaurant->slug) }}">
            </div>

            <div class="mb-3">
                <label for="piva_user" class="form-label">P. Iva</label>
                <input type="text" class="form-control" id="piva_user" name="piva_user" value="{{ old('piva_user', $restaurant->piva_user) }}">
            </div>

            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $restaurant->street) }}">
            </div>

            <div class="mb-3">
                <label for="time_open" class="form-label">Opening time</label>
                <input type="time" class="form-control" id="time_open" name="time_open" value="{{ old('time_open', $restaurant->time_open) }}">
            </div>

            <div class="mb-3">
                <label for="time_close" class="form-label">Closing time</label>
                <input type="time" class="form-control" id="time_close" name="time_close" value="{{ old('time_close', $restaurant->time_close) }}">
            </div>    

            <button class="btn btn-outline-success" type="submit">Save</button>
            <a class="btn btn btn-outline-secondary" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">Cancel</a>

        </form>
    </div>
@endsection