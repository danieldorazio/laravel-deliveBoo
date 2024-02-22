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

                <form action="{{ route('admin.meals.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nome Piatto --}}
                    <div class="form-floating mb-3">
                        <input placeholder="New meal" type="text"
                            class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        <label for="name">Name</label>
                    </div>

                    {{-- Descrizione Piatto --}}
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Description" id="description" style="height: 100px" name="description">{{ old('description') }}</textarea>
                        <label for="description">Description</label>
                    </div>

                    {{-- Immagine Piatto --}}
                    <div class="mb-3">
                        <label for="image" class="form-label @error('image') is-invalid  @enderror">Insert an
                            image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    {{-- Prezzo Piatto --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Insert price" type="number" class="form-control" id="price" name="price"
                            placeholder="Price" value="{{ old('price') }}">
                        <label for="price">Price</label>
                    </div>

                    {{-- Piatto Disponibile --}}
                    <div class="form-floating mb-3">
                        <select class="form-select" id="available" name="available" aria-label="Meal availability">
                            <option value="1">Meal available</option>
                            <option value="0">Meal not available</option>
                        </select>
                        <label for="available">Meal availability</label>
                      </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    @include('partials.goback_to_meals_index')
                </form>
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\StoreMealRequest') !!}
@endsection
