@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Meals List</h2>


        @if (count($meals) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                {{-- <th scope="col">Id</th> --}}
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($meals as $meal)
                    <tr>
                    {{-- <th scope="row">{{$meal->id}}</th> --}}
                    <td>{{$meal->name}}</td>
                    <td>
                        <a class="btn btn-outline-info px-3 mx-2" href="{{route('admin.meals.show', ['meal' => $meal->slug]) }}">
                            <i class="fa-solid fa-info"></i>
                        </a>
                        <a class="btn btn-outline-warning mx-2" href="{{route('admin.meals.edit', ['meal' => $meal->slug]) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.meals.destroy', ['meal' => $meal->slug]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger delete-btn mx-2" type="submit" data-title="{{ $meal->name }}">
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
                <p>No meals available</p>
            </div>
        @endif

        <div class="text-end my-5">
            <a class="btn btn-outline-secondary" href="{{ route('admin.meals.create') }}">Add a new meal</a>
        </div>
    </div>
    @include('partials.delete_modal')
@endsection