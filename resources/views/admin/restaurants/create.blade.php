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

        <form class="mt-5" action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Name</label>
                <input type="text" class="form-control" @error('restaurant_name') is-invalid  @enderror id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}">
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label @error('image') is-invalid  @enderror">Add an image</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Slug --}}
            {{-- <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" @error('slug') is-invalid  @enderror value="{{ old('slug') }}" id="slug" name="slug">
            </div> --}}

            {{-- P. Iva --}}
            <div class="mb-3">
                <label for="piva_user" class="form-label">P. Iva</label>
                <input type="text" class="form-control" @error('piva_user') is-invalid  @enderror value="{{ old('piva_user') }}" id="piva_user" name="piva_user">
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" @error('street') is-invalid  @enderror value="{{ old('street') }}" id="street" name="street">
            </div>

            {{-- Opening Time --}}
            <div class="mb-3">
                <label for="time_open" class="form-label">Opening time</label>
                <input type="time" class="form-control" id="time_open" name="time_open">
            </div>

            {{-- Closing Time --}}
            <div class="mb-3">
                <label for="time_close" class="form-label">Closing time</label>
                <input type="time" class="form-control" id="time_close" name="time_close">
            </div>   
            
            Categories
            <div class="mb-3">
                <label for="">Categories</label>
                    @if ($categories)
                        @foreach ($categories as $category)
                        <div class="form-check">
                            <input @checked(in_array($category->id, old('categories', []))) type="checkbox" name="categories[]" id="category-{{$category->id}}" value="{{ $category->id }}">
                            <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    @error('categories')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>

            <button class="btn btn-outline-success my-3" type="submit">Save</button>

        </form>
    </div>
@endsection