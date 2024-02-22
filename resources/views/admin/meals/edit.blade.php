@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h2 class="text-center">Create meals</h2>

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
                <form action="{{ route('admin.meals.update', ['meal' => $meal->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nome Piatto --}}
                    <div class="form-floating mb-3">
                        <input placeholder="New meal" type="text"
                            class="form-control @error('name') is-invalid  @enderror" id="name" name="name"
                            value="{{ old('name', $meal->name) }}">
                        <label for="name">Name</label>
                    </div>

                    {{-- Descrizione Piatto --}}
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Description" id="description" style="height: 100px" name="description">{{ old('description', $meal->description) }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    {{-- Immagine Piatto --}}
                    <div class="mb-3">
                        <label for="image" class="form-label @error('image') is-invalid  @enderror">Insert an
                            image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    @if ($meal->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $meal->image) }}" alt=""
                                class="my-logo-restaurant-and-food">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif

                    {{-- Prezzo Piatto --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Insert price" type="number" class="form-control" id="price" name="price"
                            placeholder="Price" value="{{ old('price', $meal->price) }}">
                        <label for="price">Price</label>
                    </div>


                    {{-- Piatto Disponibile --}}
                    <div class="form-floating mb-3">
                        <select class="form-select" id="available" name="available" aria-label="Meal availability">
                            <option @selected(old('available', $meal->available) == '1') value="1">Meal available</option>
                            <option @selected(old('available', $meal->available) == '0') value="0">Meal not available</option>
                        </select>
                        <label for="available">Meal availability</label>
                    </div>

                    {{-- Save btn --}}
                    <button type="submit" class="btn btn-outline-success">Save</button>
                    {{-- Cancel btn --}}
                    <a class="btn btn btn-outline-primary mx-3"
                        href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">Discard Changes</a>
                    {{-- Go Back btn --}}
                    @include('partials.goback_to_meals_index')
                </form>
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\UpdateMealRequest') !!}
@endsection
