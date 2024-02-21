@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Restaurant List</h2>

        @if (count($restaurant) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($restaurant as $restaurant_elem)
                    <tr>
                    <td>{{$restaurant_elem->restaurant_name}}</td>
                    <td>
                        <a class="btn btn-outline-info px-3 mx-2" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant_elem->slug]) }}">
                            <i class="fa-solid fa-info"></i>
                        </a>
                        <a class="btn btn-outline-warning mx-2" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant_elem->slug]) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant_elem->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger delete-btn mx-2" type="submit" data-title="{{ $restaurant_elem->restaurant_name }}">
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

            <div class="text-end my-5">
                <a class="btn btn-outline-secondary" href="{{ route('admin.restaurants.create') }}">Add a new restaurant</a>
            </div>
        @endif

    </div>
    @include('partials.delete_modal')
@endsection