@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h2 class="text-center">Add your restaurant</h2>

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
                <form class="" action="{{ route('admin.restaurants.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Restaurant name" type="text" class="form-control" id="restaurant_name"
                            name="restaurant_name" value="{{ old('restaurant_name') }}">
                        <label for="restaurant_name">Name</label>
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Add an image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    {{-- P. Iva --}}
                    <div class="form-floating mb-3">
                        <input placeholder="P. IVA" type="text" class="form-control" id="piva_user" name="piva_user"
                            value="{{ old('piva_user') }}">
                        <label for="piva_user">P.IVA</label>
                    </div>

                    {{-- Address --}}
                    <div class="form-floating mb-3">
                        <input placeholder="Street" type="text" class="form-control" id="street" name="street"
                            value="{{ old('street') }}">
                        <label for="street">Street</label>
                    </div>

                    {{-- Opening Time --}}
                    <div class="mb-3 col-3">
                        <label for="time_open" class="form-label">Opening time</label>
                        <input type="time" class="form-control" value="{{ old('time_open') }}" id="time_open"
                            name="time_open">
                    </div>

                    {{-- Closing Time --}}
                    <div class="mb-3 col-3">
                        <label for="time_close" class="form-label">Closing time</label>
                        <input type="time" class="form-control" id="time_close" name="time_close"
                            value="{{ old('time_close') }}">
                    </div>

                    {{-- Categories --}}
                    <div class="mb-3">
                        <label for="">Categories</label>
                        @if ($categories)
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input @checked(in_array($category->id, old('categories', []))) type="checkbox" name="categories[]"
                                        id="category-{{ $category->id }}" value="{{ $category->id }}">
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <button class="btn btn-outline-success my-3" type="submit">Save</button>

                </form>
            </div>
        </div>
    </div>



    {{-- JAVASCRIPT VALIDATOR --}}
    {!! JsValidator::formRequest('App\Http\Requests\StoreRestaurantRequest') !!}
@endsection
