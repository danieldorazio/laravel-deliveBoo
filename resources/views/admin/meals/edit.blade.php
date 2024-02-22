@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="mt-5 text-center">
            <h1>Edit meal:</h1>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-6">

                <form action="{{ route('admin.meals.update', ['meal' => $meal->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Meal name --}}
                    <div class="form-floating mb-3">
                        <input placeholder="New meal" type="text" class="form-control @error('name') is-invalid  @enderror"
                            id="name" name="name" value="{{ old('name', $meal->name) }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Meal description --}}
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Description" id="description" style="height: 100px" name="description">{{ old('description', $meal->description) }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    {{-- Meal image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label @error('image') is-invalid  @enderror">Insert an
                            image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($meal->image)
                        <div>
                            <img src="{{ asset('storage/' . $meal->image) }}" alt=""
                                class="my-logo-restaurant-and-food">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif

                    {{-- Meal price --}}
                    <div class="mt-3">
                        <label for="price">Price</label>
                        <input placeholder="Insert price" type="number"
                            class="form-control @error('price') is-invalid  @enderror" id="price" name="price"
                            value="{{ old('price', $meal->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Piatto Disponibile --}}
                    <div class="mt-3">
                        <label for="available">Availability</label>
                        <select class="form-select form-select-sm" id="available" aria-label=".form-select-sm example"
                            name="available">
                            <option @selected(old('available', $meal->available) == '1') value="1">Meal available</option>
                            <option @selected(old('available', $meal->available) == '0') value="0">Meal not available</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        {{-- Save btn --}}
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        {{-- Cancel btn --}}
                        <a class="btn btn btn-outline-primary"
                            href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">Discard Changes</a>
                        {{-- Go Back btn --}}
                        @include('partials.goback_to_meals_index')
                    </div>

                </form>
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\UpdateMealRequest') !!}
@endsection
