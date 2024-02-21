@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center gap-5 mt-5">
            <h1>Nuovo Piatto:</h1>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-6">

            <form action="{{ route('admin.meals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nome Piatto --}}
                <div class="form-floating mb-3">
                    <input placeholder="name@example.com" type="text"
                        class="form-control @error('name') is-invalid  @enderror" id="name" name="name"
                        value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Descrizione Piatto --}}
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Descrizione piatto" id="description" style="height: 100px"
                        name="description">{{ old('description') }}</textarea>
                    <label for="description">Description</label>
                </div>

                {{-- Immagine Piatto --}}
                <div class="mb-3">
                    <label for="image" class="form-label @error('image') is-invalid  @enderror">Insert an image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Prezzo Piatto --}}
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input placeholder="Inserisci il prezzo" type="text"
                        class="form-control @error('price') is-invalid  @enderror" id="price" name="price"
                        value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Piatto Disponibile --}}
                <div class="mb-3">
                    <label for="available">Availability</label>
                    <select class="form-select form-select-sm" id="available" aria-label=".form-select-sm example" name="available">
                        <option value="1">Meal available</option>
                        <option value="0">Meal not available</option>
                    </select>
                </div>

                {{-- Restaurant
            <div class="mb-3 has-validation">
                <label for="type">Select a restaurant</label>
                <select class="form-select @error('restaurant_id') is-invalid @enderror" name="restaurant_id" id="restaurant">
                    <option @selected(!old('restaurant_id')) value="">None</option>
                    @foreach ($restaurants as $restaurant)
                        <option @selected(old('restaurant_id') == $restaurant->id) value="{{ $restaurant->id }}">{{ $restaurant->restaurant_name }}</option>
                    @endforeach
                </select>   
                @error('restaurant_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
    </div>
@endsection
