@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Restaurants</h2>

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
                        <a class="btn btn-success" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug]) }}">Details</a>
                        <a class="btn btn-outline-warning" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">Edit</a>
                        <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">
                                Delete
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
@endsection