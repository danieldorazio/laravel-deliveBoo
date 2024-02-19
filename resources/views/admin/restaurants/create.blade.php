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

        <form class="mt-5" action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>

            <div class="mb-3">
                <label for="piva_user" class="form-label">P. Iva</label>
                <input type="text" class="form-control" id="piva_user" name="piva_user">
            </div>

            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street">
            </div>

            <div class="mb-3">
                <label for="time_open" class="form-label">Opening time</label>
                <input type="time" class="form-control" id="time_open" name="time_open">
            </div>

            <div class="mb-3">
                <label for="time_close" class="form-label">Closing time</label>
                <input type="time" class="form-control" id="time_close" name="time_close">
            </div>    

            <button class="btn btn-outline-success" type="submit">Save</button>

        </form>
    </div>
@endsection