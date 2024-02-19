@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="d-flex align-items-center gap-5 mt-5">
            <h1>Modifica Piatto:</h1>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-6">

                <form action="{{ route('admin.meals.update', ['meal' => $meal->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nome Piatto --}}
                    <div class="form-floating mb-3">
                        <input placeholder="name@example.com" type="text"
                            class="form-control @error('name') is-invalid  @enderror" id="name" name="name"
                            value="{{ old('name', $meal->name) }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Descrizione Piatto --}}
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Descrizione piatto" id="description" style="height: 100px"
                            name="description">{{ old('description', $meal->description) }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    {{-- Immagine Piatto --}}
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
                            <img src="{{ asset('storage/' . $meal->image) }}" alt="">
                        </div>
                    @else
                        <p>Nessuna immagine presente</p>
                    @endif

                    {{-- Prezzo Piatto --}}
                    <div>
                        <label for="price">Price</label>
                        <input placeholder="name@example.com" type="text"
                            class="form-control @error('price') is-invalid  @enderror" id="price" name="price"
                            value="{{ old('price', $meal->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Piatto Disponibile --}}
                    <div class="mb-3">
                        <label for="available">Availability</label>
                        <select class="form-select form-select-sm" id="available" aria-label=".form-select-sm example"
                            name="available">
                            <option @selected(old('available', $meal->available) == '1') value="1">Meal available</option>
                            <option @selected(old('available', $meal->available) == '0') value="0">Meal not available</option>
                        </select>
                    </div>

                    {{-- Save btn --}}
                    <button type="submit" class="btn btn-outline-success">Save</button>
                    {{-- Cancel btn --}}
                    <a class="btn btn btn-outline-primary mx-3"
                        href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">Discard Changes</a>
                    {{-- Go Back btn --}}
                    @include('partials.previous_button')
                </form>
            </div>
        </div>
    </div>
@endsection
