@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>My Restaurant</h2>

        @if (count($restaurant) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th>Info</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($restaurant as $restaurant_elem)
                    <tr>
                    <td>{{$restaurant_elem->restaurant_name}}</td>
                    <td>
                        <a class="btn btn-outline-info px-3" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant_elem->slug]) }}">
                            <i class="fa-solid fa-info"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-warning" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant_elem->slug]) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
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