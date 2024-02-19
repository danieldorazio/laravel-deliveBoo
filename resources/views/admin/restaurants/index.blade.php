@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Restaurants List</h2>

        @if (count($restaurants) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                    <th scope="row">{{$restaurant->id}}</th>
                    <td>{{$restaurant->restaurant_name}}</td>
                    <td>
                        <a class="btn btn-outline-info px-3 mx-2" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug]) }}">
                            <i class="fa-solid fa-info"></i>
                        </a>
                        <a class="btn btn-outline-warning mx-2" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger delete-btn mx-2" type="submit" data-title="{{ $restaurant->restaurant_name }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                  </tr>
                @endforeach 
            </tbody>
        </table>
        @else
            <div class="alert alert-warning mt-2">
                <p>No resturants available</p>
            </div>
        @endif

        <div class="text-end my-5">
            <a class="btn btn-outline-secondary" href="{{ route('admin.restaurants.create') }}">Add a new restaurant</a>
        </div>
    </div>
    @include('partials.delete_modal')
@endsection